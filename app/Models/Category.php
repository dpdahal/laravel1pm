<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
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
        'image',
        'posted_by'

    ];

    public function getTitleAttribute($value)
    {
        return Str::title($value);
    }

    public function getNewsByCategoryModel()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
