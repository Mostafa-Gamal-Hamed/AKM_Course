<?php

namespace App\Models;

use App\Models\User\becomeTutor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countryCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','iso','name','nicename','iso3','phonecode'
    ];

    // Relationships
    public function tutor()
    {
        return $this->hasMany(becomeTutor::class);
    }

    public function adminTutor()
    {
        return $this->hasMany(Tutor::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
