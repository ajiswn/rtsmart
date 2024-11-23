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
                'no_kk'             => '1122334455667702',
                'nik_ahli_waris'    => '1020304050607203',
                'nik_pewaris'       => '1020304050607201',
                'hubungan_pewaris'  => 'Anak',
                'tujuan'            => 'Kredit Bank',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'no_surat'          => '002/RT.02/RW.02/2024',
                'no_kk'             => '1122334455667703',
                'nik_ahli_waris'    => '1020304050607302',
                'nik_pewaris'       => '1020304050607301',
                'hubungan_pewaris'  => 'Istri',
                'tujuan'            => 'Penjualan Tanah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
