<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('agama',['Islam','Protestan','Katolik','Hindu','Budha','Konghuchu']);
            $table->string('pekerjaan');
            $table->enum('status_kawin',['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']);
            $table->string('no_telp')->nullable();
            $table->enum('peran',['Kepala Keluarga','Anggota Keluarga']);
            $table->enum('status',['Aktif','Pindah','Meninggal'])->default('Aktif');
            $table->string('no_kk');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('no_kk')->references('no_kk')->on('kartu_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
