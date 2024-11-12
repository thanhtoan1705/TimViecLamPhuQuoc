<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'position',
        'bio',
        'address',
        'github',
        'linkedin',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'status',
    ];
}
