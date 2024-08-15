<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_id',
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'institution',
        'country',
        'address',
    ];
}
