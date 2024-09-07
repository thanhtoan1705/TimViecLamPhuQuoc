<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostCandidate extends Model
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'candidate_id', 'file', 'status', 'description'];

}
