<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvField extends Model
{
    use HasFactory;

    protected $fillable = [
        'fields_name',
        'fields_type',
        'template_id',
        'order'
    ];

    public function template()
    {
        return $this->belongsTo(CVTemplate::class);
    }

    public function userCvData()
    {
        return $this->hasMany(UserCvData::class, 'fields_id');
    }



}
