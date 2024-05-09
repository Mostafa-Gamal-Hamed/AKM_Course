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
        Schema::create('manager_financials', function (Blueprint $table) {
            $table->id();
            $table->date("yearMonth");
            $table->enum("week",['1','2','3','4']);
            $table->float("yuan");
            $table->float("currency");
            $table->float("amount");
            $table->float("salary");
            $table->float("expenses")->nullable();
            $table->string("reason")->nullable();
            $table->float("rest");
            $table->float("amr");
            $table->float("khaled");
            $table->float("mostafa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_financials');
    }
};
