<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageProficiency extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'language',
        'proficiency_level',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function getProgressPercentage()
    {
        $levels = [
            'Beginner' => 20,
            'Elementary' => 40,
            'Intermediate' => 60,
            'Advanced' => 80,
            'Proficient' => 100,
        ];

        return $levels[$this->proficiency_level] ?? 0;
    }
}
