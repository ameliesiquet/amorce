<?php

namespace Database\Seeders;

use App\Models\Donator;
use App\Models\Fonds;
use App\Models\Transactions;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('fr_FR');
        $funds = Fonds::all();

        foreach ($funds as $fund) {

            $donator = Donator::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
            ]);

            $initialDeposit = random_int(500, 1500);
            Transactions::create([
                'fonds_id' => $fund->id,
                'donator_id' => $donator->id,
                'amount' => $initialDeposit,
                'status_type' => 'entrée',
                'transaction_type' => 'Initial deposit',
                'donor_name' => $donator->name,
            ]);

            for ($i = 0; $i < 7; $i++) {
                $donatorIds = Transactions::where('fonds_id', $fund->id)->pluck('donator_id')->unique();
                $donator = Donator::whereIn('id', $donatorIds)->inRandomOrder()->first();

                if (!$donator) {
                    $donator = Donator::create([
                        'name' => $faker->name,
                        'email' => $faker->unique()->safeEmail,
                    ]);
                }

                $status_type = $faker->randomElement(['entrée', 'sortie']);

                if ($status_type === 'entrée') {
                    $amount = random_int(100, 500);
                    $transaction_type = 'Virement entrant';
                } else {
                    $income = $fund->transactions()->where('status_type', 'entrée')->sum('amount');
                    $expenses = $fund->transactions()->where('status_type', 'sortie')->sum('amount');
                    $currentBalance = $income - $expenses;

                    if ($currentBalance < 50) {
                        continue;
                    }

                    $max = min(300, $currentBalance);
                    $amount = random_int(50, $max);
                    $transaction_type = 'Virement sortant';
                }

                Transactions::create([
                    'fonds_id' => $fund->id,
                    'donator_id' => $donator->id,
                    'amount' => $amount,
                    'status_type' => $status_type,
                    'transaction_type' => $transaction_type,
                    'donor_name' => $donator->name,
                ]);
            }
        }
    }
}

