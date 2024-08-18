<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'job_id',
        'employer_id',
        'interview_name',
        'interview_phone',
        'interview_email',
        'time',
        'viewer',
        'location',
        'status',
        'interview_feeback',
        'interview_date',
        'note',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function job_post()
    {
        return $this->belongsTo(Job_post::class, 'job_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
