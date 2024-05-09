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
        Schema::create('tutor_classes', function (Blueprint $table) {
            $table->id();
            $table->enum("week",[1,2,3,4]);
            $table->integer("reserved");
            $table->integer("absent");
            $table->integer("conducted");
            $table->string("tutors_name");
            $table->foreign("tutors_name")->references("name")->on("tutors");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_classes');
    }
};
