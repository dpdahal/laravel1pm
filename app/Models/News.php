<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'status',
        'meta_keywords',
        'meta_description',
        'summary',
        'description',
        'thumbnail',
        'image',
        'posted_by',
        'category_id'

    ];
}
