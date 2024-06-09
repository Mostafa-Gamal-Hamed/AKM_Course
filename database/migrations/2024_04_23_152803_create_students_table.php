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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string("email")->unique();
            $table->bigInteger("phone");
            $table->enum("gender",["male","female"]);
            $table->string("country",100);
            $table->string("city",100);
            $table->enum("payment",["cash","installment"]);
            $table->bigInteger("amount");
            $table->bigInteger("remaining")->nullable();
            $table->date("paymentDate")->nullable();
            $table->date("Paid");
            $table->date("startDate");
            $table->date("endDate");
            $table->bigInteger("levels");
            $table->bigInteger("sessions");
            $table->bigInteger("Attended")->nullable();
            $table->bigInteger("Absented")->nullable();
            $table->bigInteger("remainingSessions")->nullable();
            $table->string("image");
            $table->foreignId("country_codes_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("levels_level")->references("level")->on("levels")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
