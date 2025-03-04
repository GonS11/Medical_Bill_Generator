<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();

        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'name' => 'Paula',
                'surname' => 'Salicio Geanini',
                'email' => 'admin@example.com',
                'dni' => $this->generatedni(),
            ],
            [
                'username' => 'administrative',
                'password' => Hash::make('administrative'),
                'role' => 'administrative',
                'name' => 'Secretary',
                'surname' => 'Secretary',
                'email' => 'administrative@example.com',
                'dni' => $this->generatedni(),
            ],
            [
                'username' => 'drmartinez',
                'password' => Hash::make('drmartinez'),
                'role' => 'doctor',
                'name' => 'Manuel',
                'surname' => 'Martínez Sánchez',
                'email' => 'drmartinez@example.com',
                'dni' => $this->generatedni(),
            ],
            [
                'username' => 'drmendez',
                'password' => Hash::make('drmendez'),
                'role' => 'doctor',
                'name' => 'Marta',
                'surname' => 'Méndez González',
                'email' => 'drmendez@example.com',
                'dni' => $this->generatedni(),
            ],
            [
                'username' => 'drsalicio',
                'password' => Hash::make('paula'),
                'role' => 'doctor',
                'name' => 'Leonor',
                'surname' => 'Martín González',
                'email' => 'drsalicio@example.com',
                'dni' => $this->generatedni(),
            ],
            [
                'username' => 'doctor',
                'password' => Hash::make('doctor'),
                'role' => 'doctor',
                'name' => 'Doctor',
                'surname' => 'Doctor',
                'email' => 'doctor@example.com',
                'dni' => $this->generatedni(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }

    /**
     * Genera un dni español válido.
     */
    private function generatedni(): string
    {
        $numbers = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $letter = $letters[$numbers % 23];

        return $numbers . $letter;
    }
}
