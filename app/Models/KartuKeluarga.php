<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'no_kk';
    protected $fillable = ['nama_kepala_keluarga','alamat','status'];

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
}
