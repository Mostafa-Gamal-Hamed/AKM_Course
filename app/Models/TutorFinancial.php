<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorFinancial extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","yearMonth","week","days","kpis","salary",
        "deduction","additional","total","created_at"
    ];
}
