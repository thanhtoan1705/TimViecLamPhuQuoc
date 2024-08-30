<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'packages_id',
        'remaining_posts',
        'expires_at',
    ];

    public function jobPostPackage()
    {
        return $this->belongsTo(JobPostPackage::class, 'packages_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
}
