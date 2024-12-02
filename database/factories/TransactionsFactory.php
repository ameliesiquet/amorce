<?php

namespace Database\Factories;

use App\Enum\StatusType;
use App\Enum\TransactionType;
use App\Models\Fonds;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_type' => collect([StatusType::INPUT->value, StatusType::OUTPUT->value])->random(),
            'transaction_type' => collect([TransactionType::CASH->value, TransactionType::CSV->value])->random(),
            'amount' => $this->faker->numberBetween(0, 1000),
            'fonds_id' => Fonds::inRandomOrder()->first()->id,
        ];
    }
}
