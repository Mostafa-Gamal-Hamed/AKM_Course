<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        "firstName","lastName","email","number","message"
    ];
}
