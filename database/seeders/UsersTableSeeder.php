<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'no_kk'     => '1505071701110041',
                'role'      => 'ketua_rt',
                'status'    => 'Aktif',
                'created_at'=> now(),
                'updated_at'=> now(),
                'password'  => Hash::make('123'),
            ],
            [
                'no_kk'     => '1505071701110040',
                'role'      => 'warga',
                'status'    => 'Aktif',
                'created_at'=> now(),
                'updated_at'=> now(),
                'password'  => Hash::make('123'),
            ],
        ]);
    }
}
