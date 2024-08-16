<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fiJob_post extends Model
{
    use HasFactory;
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
        'end_date',
        'start_date',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'salary_min',
        'salary_max',
        'quantity',
        'status',
        'premium',
        'address_id',
    ];
}
