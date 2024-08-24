<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class);
    }
}
