<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","email","phone","gender","country","city","payment","amount","remaining","paymentDate","Paid","startDate",
        "endDate","levels","sessions","Attended","Absented","remainingSessions","image","country_codes_id","levels_level"
    ];

    // Relationship
    public function countryCode()
    {
        return $this->belongsTo(countryCode::class,"country_codes_id");
    }
}
