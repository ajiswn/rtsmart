<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatabel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatabel
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
