<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Job_category extends Model implements Sortable
{
    use HasFactory, SortableTrait;
    protected $fillable = [
        'order',
        'name',
        'slug',
        'image'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
        'sort_when_updating' => true,
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'job_category_id');
    }
}
