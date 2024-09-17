<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'major_id',
        'resume_id',
        'experience_id',
        'education_id',
        'degree_id',
        'address_id',
        'salary_id',
//        'salary',
        'description',
        'featured',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'candidate_skill');
    }

    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

//    public function interviews()
//    {
//        return $this->hasMany(Interview::class);
//    }

    public function savedJobs()
    {
        return $this->belongsToMany(JobPost::class, 'saved_jobs', 'candidate_id', 'job_post_id');
    }

//    public function jobPosts()
//    {
//        return $this->belongsToMany(JobPost::class, 'job_post_candidate');
//    }


    // Chức năng interview
    public function jobPostsAppliedTo()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_candidates', 'candidate_id', 'job_post_id');
    }

    public function interviews(): BelongsToMany
    {
        return $this->belongsToMany(Interview::class, 'candidate_interviews', 'candidate_id', 'interview_id');
    }
}
