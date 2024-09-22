<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatabel;

class Admin extends Authenticatabel
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'username', 'password'];
}
