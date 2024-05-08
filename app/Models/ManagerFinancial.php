<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerFinancial extends Model
{
    use HasFactory;
    protected $fillable = [
        "yearMonth","week","yuan","currency","amount","salary",
        "expenses","reason","rest","amr","khaled","mostafa","created_at"
    ];
}
