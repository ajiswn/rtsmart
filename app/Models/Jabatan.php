<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $primaryKey = 'id';
    protected $fillable = ['jabatan'];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class, 'id_jabatan', 'id');
    }
}
