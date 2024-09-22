<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(ArtikelTableSeeder::class);
        $this->call(PendaftaranTableSeeder::class);
        $this->call(PengurusTableSeeder::class);
        $this->call(JabatansTableSeeder::class);
    }
    
}
