<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
                'kab_kota'          => 'Kabupaten Muaro Jambi',
                'kecamatan'         => 'Jambi Luar Kota',
                'desa_kelurahan'    => 'Desa Mendalo Indah',
                'rt'                => '07',
                'rw'                => '03',
                'alamat'            => 'Perumahan Anugrah Mandiri 11, Blok R 9I',
                'website'           => 'rtsmart.id',
                'created_at'        => now(),
                'updated_at'        => now(),
        ]);
    }
}
