<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'logo',
        'tanda_tangan',
        'kab_kota',
        'kecamatan',
        'desa_kelurahan',
        'rt',
        'rw',
        'alamat',
        'website',
    ];
}
