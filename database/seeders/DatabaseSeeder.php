<?php

namespace Database\Seeders;

use App\Models\Fonds;
use App\Models\Transactions;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Fonds::factory(3)->create();
        Fonds::factory()->create(['title' => 'Fond général', 'specific' => false]);
        Fonds::factory()->create(['title' => 'Fond fonctionnement', 'specific' => false]);

        Transactions::factory(80)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret',
        ]);
    }
}
