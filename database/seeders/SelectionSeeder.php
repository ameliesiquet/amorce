<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Selection;
use App\Models\Donator;
use Illuminate\Support\Carbon;

class SelectionSeeder extends Seeder
{
    public function run(): void
    {
        $selection = Selection::create([
            'name' => 'Test Selection 1',
            'status' => 'active',
        ]);

        foreach (range(1, 9) as $i) {
            $status = match (true) {
                $i <= 3 => 1,
                $i <= 6 => 2,
                default => 3,
            };

            $donator = Donator::create([
                'name' => "Test Donator $i",
                'email' => "testdonator$i@example.com",
                'disponibility' => true,
                'selection_count' => $status,
                'last_selection' => Carbon::now()->subMonths($status),
                'donations_dates' => json_encode([
                    Carbon::now()->subMonths($status)->toDateString(),
                ]),
            ]);

            $selection->donators()->attach($donator->id, [
                'status_in_selection' => $status,
            ]);
        }
    }
}
