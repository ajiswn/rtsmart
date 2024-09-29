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
            'name'      => 'Ketua RT',
            'username'  => 'admin',
            'role'      => 'ketua_rt',
            'created_at'=> now(),
            'updated_at'=> now(),
            'password'  => Hash::make('123'),
        ]);
    }
}
