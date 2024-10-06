<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'id';
    protected $fillable = ['no_kk','alamat','image','status'];

    public function warga()
    {
        return $this->belongsTo(Warga::class,'no_kk','no_kk');
    }

    public function users()
    {
      return $this->belongsTo(User::class,'no_kk','no_kk');
    }
}
