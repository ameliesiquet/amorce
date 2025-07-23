<?php

namespace Database\Seeders;

use App\Models\Fonds;
use App\Models\Transactions;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $funds = Fonds::all();

        foreach ($funds as $fund) {
            //depot initial
            $initialDeposit = random_int(500, 1500);
            Transactions::create([
                'fonds_id' => $fund->id,
                'amount' => $initialDeposit,
                'status_type' => 'entrée',
                'transaction_type' => 'Initial deposit',
            ]);

            //entrées
            for ($i = 0; $i < 2; $i++) {
                $from = $funds->random();
                Transactions::create([
                    'fonds_id' => $fund->id,
                    'amount' => random_int(100, 500),
                    'status_type' => 'entrée',
                    'transaction_type' => 'Virement du fond "' . $from->title . '"',
                ]);
            }
            //dépenses
            for ($i = 0; $i < 5; $i++) {
                $to = $funds->where('id', '!=', $from->id)->random();
                $income = $fund->transactions()->where('status_type', 'entrée')->sum('amount');
                $expenses = $fund->transactions()->where('status_type', 'sortie')->sum('amount');
                $currentBalance = $income - $expenses;

                if ($currentBalance < 50) break;

                $max = min(300, $currentBalance);
                $expense = random_int(50, $max);

                Transactions::create([
                    'fonds_id' => $fund->id,
                    'amount' => $expense,
                    'status_type' => 'sortie',
                    'transaction_type' => 'Virement au fond "' . $to->title .'"',
                ]);
            }
        }
    }
}
