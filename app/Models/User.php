<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    use HasFactory;

    protected $fillable = [
        "id",
        "fullname",
        "email",
        "password",
        "phone",
        "address",
        "level",
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
}
