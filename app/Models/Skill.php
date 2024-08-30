<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_skill');
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_skill');
    }

}
