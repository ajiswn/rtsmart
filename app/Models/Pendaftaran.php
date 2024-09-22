<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','nim','prodi','fakultas','tempat_lahir','tgl_lahir','angkatan','email','ktm','alasan','twibbon','status'];
}
