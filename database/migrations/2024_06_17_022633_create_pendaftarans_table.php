<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('angkatan');
            $table->string('email')->unique();
            $table->string('ktm');
            $table->text('alasan');
            $table->string('twibbon');
            $table->enum('status',['Proses','Diterima','Ditolak'])->default('Proses');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
