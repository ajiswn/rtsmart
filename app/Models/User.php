<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'no_kk',
        'password',
        'role',
        'status',
        'photo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kartukeluarga()
    {
        return $this->belongsTo(Warga::class,'no_kk','no_kk');
    }

    public function surat_ahli_waris()
    {
      return $this->belongsTo(Warga::class,'no_kk','no_kk');
    }
}
