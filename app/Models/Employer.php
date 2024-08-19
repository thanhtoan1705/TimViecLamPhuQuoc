<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'slug',
        'name',
        'phone',
        'since',
        'company_logo',
        'tax_code',
        'description',
        'website_url',
        'facebook_url',
        'company_size',
        'company_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function job_post()
    {
        return $this->hasMany(Job_post::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'id');
    }
}
