<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'major_id',
        'resume_id',
        'experience_id',
        'education_id',
        'skill_id',
        'degree_id',
        'address_id',
        'salary',
    ];
}
