<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'method_type',
        'details',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
