<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCvData extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'fields_value',
        'fields_id',
    ];

    public function template()
    {
        return $this->belongsTo(CvTemplate::class, 'template_id');
    }

    public function field()
    {
        return $this->belongsTo(CvField::class, 'fields_id');
    }
}
