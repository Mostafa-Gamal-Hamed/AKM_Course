<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class becomeTutor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','phone','gender','date','address','country','city','experience',
        'resume','video','country_code_id'
    ];

    // relationships
    public function countryCode()
    {
        return $this->belongsTo(countryCode::class);
    }
}
