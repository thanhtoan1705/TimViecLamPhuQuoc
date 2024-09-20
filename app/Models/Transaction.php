<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'employer_id',
        'merchant_id',
        'amount',
        'transaction_type',
        'status',
    ];

    public function logs()
    {
        return $this->hasMany(TransactionLog::class, 'transaction_id');
    }
}
