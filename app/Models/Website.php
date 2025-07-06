<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'websites';
    protected $fillable = [
        'siteid',
        'site_name',
        'site_url',
        'site_title',
        'site_description',
        'social_links',
        'created_by',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
