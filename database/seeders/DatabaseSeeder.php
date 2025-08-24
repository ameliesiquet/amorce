<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FondsSeeder::class,
            TransactionSeeder::class,
            UserSeeder::class,
            DonatorSeeder::class,
            SelectionSeeder::class,
            ParticipationSeeder::class
        ]);
    }
}
