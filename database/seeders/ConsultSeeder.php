<?php

namespace Database\Seeders;

use App\Models\Consult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consult::factory()->count(15)->create();
    }
}
