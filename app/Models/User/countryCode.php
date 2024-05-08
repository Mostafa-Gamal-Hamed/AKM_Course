<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countryCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'iso','name','nicename','iso3','phonecode'
    ];

    // Relationships
    public function tutor()
    {
        return $this->hasMany(becomeTutor::class);
    }
}
