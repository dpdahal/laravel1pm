<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'date',
        'status',
        'meta_keywords',
        'meta_description',
        'summary',
        'description',
        'image',
        'posted_by'

    ];
}
