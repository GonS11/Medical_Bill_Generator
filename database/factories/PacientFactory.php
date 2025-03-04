<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pacient>
 */
class PacientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->generatedni(),
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'birthday' => $this->faker->date('Y-m-d', '2005-12-31'), // Máx. 18 años
            'telephone' => $this->faker->numerify('+34#########'), // Formato español
            'insure_num' => Str::upper($this->faker->bothify('???###-###-###')), // Ej: ABC123-456-789
            'insurance' => $this->faker->randomElement(['insured', 'not insured']),
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
