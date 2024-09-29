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
                'nama_kepala_keluarga'  => 'Syaiful Bahri',
                'alamat'                => 'Blok R 9I',
                'status'                => 'Aktif',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
        ]);
    }
}
