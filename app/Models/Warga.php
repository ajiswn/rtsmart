<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $fillable = ['nama','nik','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','pekerjaan','status_kawin','no_telp','peran','status','no_kk','image'];

    public function kartukeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    }

    public function surat()
    {
        return $this->belongsTo(SuratAhliWaris::class, 'nik', 'nik_ahli_waris');
    }

    public function suratku()
    {
        return $this->belongsTo(SuratAhliWaris::class, 'nik', 'nik_pewaris');
    }
}
