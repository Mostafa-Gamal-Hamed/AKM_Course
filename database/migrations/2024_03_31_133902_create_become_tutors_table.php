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
        Schema::create('become_tutors', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string("email");
            $table->bigInteger("phone");
            $table->enum("gender",["male","female"])->default("male");
            $table->date("date");
            $table->string("address");
            $table->string("country",100);
            $table->string("city",100);
            $table->integer("experience");
            $table->string("resume");
            $table->string("video");
            $table->foreignId("country_code_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('become_tutors');
    }
};
