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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("email")->unique();
            $table->bigInteger("phone");
            $table->enum("gender",["male","female"]);
            $table->string("country",100);
            $table->string("city",100);
            $table->string("levels",100);
            $table->integer("sessions");
            $table->integer("absence");
            $table->string("image");
            $table->date("startDate");
            $table->foreignId("country_codes_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
