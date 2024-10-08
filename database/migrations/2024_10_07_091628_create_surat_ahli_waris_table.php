<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratAhliWarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_ahli_waris', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->string('no_kk');
            $table->string('nik_ahli_waris');
            $table->string('nik_pewaris');
            $table->string('hubungan_pewaris');
            $table->string('ktp_ahli_waris')->nullable();
            $table->string('ktp_pewaris')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta_kematian')->nullable();
            $table->string('tujuan');
            $table->enum('status',['Diproses','Disetujui','Ditolak'])->default('Diproses');
            $table->timestamps();

            $table->foreign('nik_ahli_waris')->references('nik')->on('warga');
            $table->foreign('nik_pewaris')->references('nik')->on('warga');
            $table->foreign('no_kk')->references('no_kk')->on('users');
        });
    }
    
    /**
     * Run the migrations.
     *
     * @return void,
     */
    public function down()
    {
        Schema::dropIfExists('surat_ahli_waris');
    }
}
