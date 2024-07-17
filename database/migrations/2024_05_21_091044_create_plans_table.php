<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("comment")->nullable();
            $table->enum("countryName", ["Egypt", "United Arab Emirates", "Saudi Arabia", "Kuwait", "Qatar", "Bahrain", "Other"])->default("Other");
            $table->bigInteger("price");
            $table->bigInteger("offerPrice")->nullable();
            $table->string("month");
            $table->string("sessions");
            $table->enum("type", ["Online session"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
