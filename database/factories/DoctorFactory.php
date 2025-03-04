<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName,
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'dni' => $this->generatedni(),
        ];
    }

    /**
     * Generate a valid Spanish dni.
     */
    private function generatedni(): string
    {
        $numbers = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $letter = $letters[$numbers % 23];

        return $numbers . $letter;
    }
}
