<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostCandidate extends Model
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'candidate_id', 'file', 'status', 'description'];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
