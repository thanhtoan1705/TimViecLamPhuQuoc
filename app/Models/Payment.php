<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'packages_id',
        'promotion_id',
        'amount',
        'payment_date',
        'expiration_date',
        'payment_method',
        'payment_status',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobPostPackage()
    {
        return $this->belongsTo(JobPostPackage::class, 'packages_id');
    }
}
