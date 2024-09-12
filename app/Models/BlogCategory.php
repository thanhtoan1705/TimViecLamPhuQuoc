<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'name',
        'slug',
        'image',
        'is_active',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
        'sort_when_updating' => true,
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
