<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Support\Str;



class User extends Auth
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'gender',
        'image',
        'user_type',
        'status'
    ];

    public function getNameAttribute($value){
        return Str::title($value);
    }

    public function getGenderAttribute($value){
        return Str::title($value);
    }
}
