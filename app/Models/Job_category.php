<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image'
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'job_category_id');
    }
}
