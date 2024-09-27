<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class JobPost extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'title',
                'job_category_id',
                'job_type_id',
                'salary_id',
            ]);
    }

    protected $fillable = [
        'title',
        'slug',
        'job_category_id',
        'major_id',
        'employer_id',
        'experience_id',
        'job_type_id',
        'rank_id',
        'degrees_id',
        'salary_id',
        'end_date',
        'start_date',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'salary_min',
        'salary_max',
        'quantity',
        'email',
        'phone',
        'gender',
        'department',
        'job_requirement',
        'cv_requirement',
        'status',
        'premium',
        'address',
    ];

    public function job_category()
    {
        return $this->belongsTo(Job_category::class, 'job_category_id');
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'job_post_major');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experience_id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degrees_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_post_skill');
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'saved_jobs', 'job_post_id', 'candidate_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    // Chức năng interview
    public function candidatesAppliedToJob()
    {
        return $this->belongsToMany(Candidate::class, 'job_post_candidates', 'job_post_id', 'candidate_id');
    }
}
