<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template_id',
        'cv_content',
    ];

    protected $casts = [
        'cv_content' => 'json'
    ];

    public function template()
    {
        return $this->belongsTo(CvTemplate::class, 'template_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
