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
}
