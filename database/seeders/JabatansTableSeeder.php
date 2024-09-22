<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JabatansTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jabatans')->insert([
            [
                'jabatan'=>'Direktur Utama'
            ],
            [
                'jabatan'=>'Wakil Direktur Utama'
            ],
            [
                'jabatan'=>'Sekretaris 1'
            ],
            [
                'jabatan'=>'Sekretaris 2'
            ],
            [
                'jabatan'=>'Bendahara 1'
            ],
            [
                'jabatan'=>'Bendahara 2'
            ],
            [
                'jabatan'=>'Anggota'
            ],

        ]);
    }
}
