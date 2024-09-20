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
        'payment_method_id',
        'transaction_id',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobPostPackage()
    {
        return $this->belongsTo(JobPostPackage::class, 'packages_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
