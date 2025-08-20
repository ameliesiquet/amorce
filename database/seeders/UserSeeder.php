<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret',
        ]);

        User::factory()->create([
            'name' => 'Amélie Siquet',
            'email' => 'ameliesiquet@icloud.com',
            'password' => '1Secret-',
        ]);
        User::factory()->create([
            'name' => 'Michaël',
            'email' => 'michael@example.com',
            'password' => '1Secret-',
        ]);
        User::factory()->create([
            'name' => 'Dominique',
            'email' => 'dominique@example.com',
            'password' => '1Secret-',
        ]);
    }
}
