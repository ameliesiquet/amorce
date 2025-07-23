<?php

namespace Database\Seeders;

use App\Models\Fonds;
use Illuminate\Database\Seeder;

class FondsSeeder extends Seeder
{
    public function run(): void
    {
        Fonds::factory(7)->create();
        Fonds::factory()->create(['title' => 'Fond général', 'specific' => false]);
        Fonds::factory()->create(['title' => 'Fond fonctionnement', 'specific' => false]);
    }
}
