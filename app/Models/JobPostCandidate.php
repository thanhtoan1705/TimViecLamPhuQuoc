<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JobPostCandidate extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['job_post_id', 'candidate_id', 'file', 'status', 'viewed', 'description'];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
