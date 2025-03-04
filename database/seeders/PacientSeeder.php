<?php

namespace Database\Seeders;

use App\Models\Pacient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pacient::factory()->count(5)->create();
    }
}
