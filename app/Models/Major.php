<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'describe',
        'slug',
    ];

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_major');
    }
}
