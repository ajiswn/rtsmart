<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KartuKeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kartu_keluarga')->insert([
            [
                'no_kk'                 => '1505071701110041',
                'alamat'                => 'Blok R 9I',
                'image'                 => 'img\kartu_keluarga\kk-1.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'no_kk'                 => '1505071701110040',
                'alamat'                => 'Blok R 8A',
                'image'                 => 'img\kartu_keluarga\kk-2.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'no_kk'                 => '1505071701110039',
                'alamat'                => 'Blok R 7B',
                'image'                 => 'img\kartu_keluarga\kk-3.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
        ]);
    }
}
