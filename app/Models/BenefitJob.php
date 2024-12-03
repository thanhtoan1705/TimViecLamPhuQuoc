<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitJob extends Model
{
    use HasFactory;

    protected $table = 'benefit_jobs';

    protected $fillable = [
        'name',
        'insurance',
        'annual_leave',
        'uniform',
        'salary_increase',
        'bonus',
        'training',
        'allowance',
        'laptop',
        'business_trip',
        'travel',
        'seniority_allowance',
        'healthcare',
        'shuttle_bus',
        'sports_club',
        'international_travel',
    ];

    public function jobPost()
    {
        return $this->hasOne(jobPost::class);
    }
}
