<?php

namespace Database\Seeders;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\LowonganFiles;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create();
         Lowongan::factory()->create();
         Lamaran::factory()->create();
         LowonganFiles::factory()->create();
    }
}
