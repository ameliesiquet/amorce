<?php

namespace Database\Factories;

use App\Enum\SelectionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Selection>
 */
class SelectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Détente n°',
            'status' => $this->faker->randomElement([SelectionStatus::PENDING->value, SelectionStatus::CLOSED->value]),
        ];
    }
}
