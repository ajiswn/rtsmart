<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratAhliWarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surat_ahli_waris')->insert([
            [
                'no_surat'          => '001/RT.02/RW.02/2024',
                'no_kk'             => '1505071701110040',
                'nik_ahli_waris'    => '1505070202040002',
                'nik_pewaris'       => '1505071405730002',
                'hubungan_pewaris'  => 'Anak',
                'tujuan'            => 'Kredit Bank',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'no_surat'          => '002/RT.02/RW.02/2024',
                'no_kk'             => '1505071701110040',
                'nik_ahli_waris'    => '1505075907780002',
                'nik_pewaris'       => '1505071405730002',
                'hubungan_pewaris'  => 'Istri',
                'tujuan'            => 'Penjualan Tanah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
