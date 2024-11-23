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
                'no_kk'                 => '1122334455667701',
                'alamat'                => 'Blok A 01',
                'image'                 => 'img\kartu_keluarga\kk-1.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'no_kk'                 => '1122334455667702',
                'alamat'                => 'Blok A 02',
                'image'                 => 'img\kartu_keluarga\kk-2.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'no_kk'                 => '1122334455667703',
                'alamat'                => 'Blok A 03',
                'image'                 => 'img\kartu_keluarga\kk-3.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'no_kk'                 => '1122334455667704',
                'alamat'                => 'Blok A 04',
                'image'                 => 'img\kartu_keluarga\kk-4.jpg',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'no_kk'                 => '1122334455667705',
                'alamat'                => 'Blok A 05',
                'image'                 => null,
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
        ]);
    }
}
