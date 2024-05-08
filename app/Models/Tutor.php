<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","email","phone","gender","country","city","levels",
        "sessions","absence","image","startDate","country_codes_id"
    ];

    // Relationship
    public function countryCode()
    {
        return $this->belongsTo(countryCode::class,"country_codes_id");
    }

    public function tutorClasses()
    {
        return $this->hasMany(tutorClasses::class);
    }
}
