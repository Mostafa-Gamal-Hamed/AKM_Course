<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorClasses extends Model
{
    use HasFactory;
    protected $fillable = [
        "week","reserved","absent","conducted","tutors_name"
    ];

    // Relationship
    public function tutor()
    {
        return $this->belongsTo(Tutor::class,"tutors_name");
    }
}
