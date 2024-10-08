<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(KartuKeluargaTableSeeder::class);
        $this->call(WargaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(PekerjaanTableSeeder::class);
        $this->call(SuratAhliWarisTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
    
}
