<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

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
}
