<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fonds>
 */
class FondsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->company(),
            'specific' => true,
            'total' => $this->faker->numberBetween(1000, 10000),
            'expenses' => $this->faker->numberBetween(1000, 10000),
            'income' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
