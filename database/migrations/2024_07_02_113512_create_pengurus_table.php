<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama_lengkap');
            $table->string('id_jabatan');
            $table->string('prodi');
            $table->string('angkatan');
            $table->enum('status',['aktif','nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengurus');
    }
};
