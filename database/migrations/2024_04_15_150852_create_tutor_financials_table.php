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
        Schema::create('tutor_financials', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("yearMonth");
            $table->enum("week",["1","2","3","4"]);
            $table->enum("days",["1","2","3","4","5","6","7"]);
            $table->float("kpis");
            $table->float("salary");
            $table->float("deduction");
            $table->float("additional");
            $table->float("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_financials');
    }
};
