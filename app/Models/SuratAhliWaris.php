<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratAhliWaris extends Model
{
    use HasFactory;

    protected $table = 'surat_ahli_waris';

    protected $fillable = [
        'no_surat',
        'no_kk',
        'nik_ahli_waris',
        'nik_pewaris',
        'hubungan_pewaris',
        'ktp_ahli_waris',
        'ktp_pewaris',
        'kk',
        'akta_kematian',
        'tujuan',
        'status',
    ];

    public function warga()
    {
      return $this->belongsTo(Warga::class,'nik_ahli_waris','nik');
    }

    public function wargaku()
    {
      return $this->belongsTo(Warga::class,'nik_pewaris','nik');
    }

    public function user()
    {
      return $this->belongsTo(Warga::class,'no_kk','no_kk');
    }

    public function kk()
    {
      return $this->belongsTo(Warga::class,'no_kk','no_kk');
    }
}
