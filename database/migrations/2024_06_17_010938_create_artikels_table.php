<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar')->nullable();
            $table->string('tanggal');
            $table->enum('kategori',['Sosial','Keagamaan','Olahraga','Lingkungan','Pendidikan']);
            $table->longText('konten');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
