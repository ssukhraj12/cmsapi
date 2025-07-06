<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'blogs';
    protected $fillable = [
        'title',
        'slug',
        'image_url',
        'short_content',
        'blog_content',
        'tags',
        'category',
        'published',
        'created_by',
        'siteid',
    ];

    protected $casts = [
        'published' => 'boolean',
        'tags' => 'array',
    ];
}
