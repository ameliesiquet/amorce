<?php

namespace Database\Seeders;

use App\Models\Donator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DonatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Donator::create([
                'name' => "New Donator $i",
                'email' => "newdonator$i@example.com",
                'disponibility' => true,
                'selection_count' => null,
                'last_selection' => null,
                'donations_dates' => json_encode([
                    Carbon::now()->subMonths(rand(0, 3))->toDateString(),
                ]),
            ]);
        }
    }
}
