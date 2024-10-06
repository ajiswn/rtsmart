<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warga')->insert([
            [
                'nik'               => '1505071405730002',
                'no_kk'             => '1505071701110041',
                'nama'              => 'Syaiful Bahri',
                'jenis_kelamin'     => 'Laki-laki',
                'tempat_lahir'      => 'Sumatra Utara',
                'tanggal_lahir'     => Carbon::now()->format('d F Y'),
                'agama'             => 'Islam',
                'pekerjaan'         => 'Petani/Pekebun',
                'kewarganegaraan'   => 'WNI',
                'peran'             => 'Kepala Keluarga',
                'status'            => 'Aktif',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nik'               => '1505075907780002',
                'no_kk'             => '1505071701110041',
                'nama'              => 'Saminem',
                'jenis_kelamin'     => 'Perempuan',
                'tempat_lahir'      => 'Sumatra Utara',
                'tanggal_lahir'     => Carbon::now()->format('d F Y'),
                'agama'             => 'Islam',
                'pekerjaan'         => 'Mengurus Rumah Tangga',
                'kewarganegaraan'   => 'WNI',
                'peran'             => 'Anggota Keluarga',
                'status'            => 'Aktif',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nik'               => '1505070202040002',
                'no_kk'             => '1505071701110041',
                'nama'              => 'Aji Setiawan',
                'jenis_kelamin'     => 'Laki-laki',
                'tempat_lahir'      => 'Muaro Jambi',
                'tanggal_lahir'     => Carbon::now()->format('d F Y'),
                'agama'             => 'Islam',
                'pekerjaan'         => 'Pelajar/Mahasiswa',
                'kewarganegaraan'   => 'WNI',
                'peran'             => 'Anggota Keluarga',
                'status'            => 'Aktif',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nik'               => '1505071405730003',
                'no_kk'             => '1505071701110040',
                'nama'              => 'Aman Bahri',
                'jenis_kelamin'     => 'Laki-laki',
                'tempat_lahir'      => 'Sumatra Utara',
                'tanggal_lahir'     => Carbon::now()->format('d F Y'),
                'agama'             => 'Islam',
                'pekerjaan'         => 'Petani/Pekebun',
                'kewarganegaraan'   => 'WNI',
                'peran'             => 'Kepala Keluarga',
                'status'            => 'Aktif',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nik'               => '1505071405730004',
                'no_kk'             => '1505071701110039',
                'nama'              => 'Elvi Sahri',
                'jenis_kelamin'     => 'Laki-laki',
                'tempat_lahir'      => 'Sumatra Utara',
                'tanggal_lahir'     => Carbon::now()->format('d F Y'),
                'agama'             => 'Islam',
                'pekerjaan'         => 'Petani/Pekebun',
                'kewarganegaraan'   => 'WNI',
                'peran'             => 'Kepala Keluarga',
                'status'            => 'Aktif',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
