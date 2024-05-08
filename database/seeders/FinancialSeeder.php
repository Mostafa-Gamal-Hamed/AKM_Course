<?php

namespace Database\Seeders;

use App\Models\ManagerFinancial;
use App\Models\TutorFinancial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FinancialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) {
            TutorFinancial::create([
                "name"=>"Morsy",
                "yearMonth" => "2023-0".rand(1,9)."-01",
                "week" => rand(1,4),
                "days" => rand(1,7),
                "kpis" => "7",
                "salary" => "123",
                "deduction" => "345",
                "additional" => "50",
                "total" => "3000"
            ]);
        }
    }
}
