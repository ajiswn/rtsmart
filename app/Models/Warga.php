<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $fillable = ['nama','nik','jenis_kelamin','alamat','tempat_lahir','tanggal_lahir','agama','pekerjaan','kewarganegaraan','peran','status','no_kk'];

    public function kartukeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}
