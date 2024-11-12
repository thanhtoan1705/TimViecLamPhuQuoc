<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostPackage extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'price',
        'period',
        'quantity',
        'limit_job_post',
        'display_top',
        'display_best',
        'display_haste',
        'descriptions',
        'label',
        'status',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'packages_id');
    }

    public function userJobPackages()
    {
        return $this->hasMany(UserJobPackage::class, 'packages_id');
    }

    public static function getTotalActiveUsersWithDisplayBest()
    {
        return UserJobPackage::whereHas('jobPostPackage', function ($query) {
            $query->where('display_best', 1);
        })
            ->where('expires_at', '>', now())
            ->count();
    }

    public static function getTotalActiveUsersWithDisplayTop()
    {
        return UserJobPackage::whereHas('jobPostPackage', function ($query) {
            $query->where('display_top', 1);
        })
            ->where('expires_at', '>', now())
            ->count();
    }
}
