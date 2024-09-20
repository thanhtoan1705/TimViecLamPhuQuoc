<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_method_id';

    protected $fillable = [
        'user_id',
        'method_type',
        'details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
