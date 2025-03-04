<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Pacient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consult>
 */
class ConsultFactory extends Factory
{
    /**
     * Define el estado por defecto del modelo.
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d'),
            'hour' => $this->faker->time('H:i:s'),
            'username' => Doctor::factory(),
            'dni' => Pacient::factory(),
        ];
    }
}
