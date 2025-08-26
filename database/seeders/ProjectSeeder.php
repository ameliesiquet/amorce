<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        $noms = ['Agence', 'École', 'Bureau', 'Studio', 'Atelier', 'Projet', 'Campagne', 'Service', 'Société', 'Collectif'];
        $themes = ['digital', 'marketing', 'innovation', 'créatif', 'design', 'communication', 'développement', 'urbanisme', 'social', 'culturel'];

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->randomElement($noms) . ' ' . $faker->randomElement($themes);
            $description = $faker->sentence(rand(8, 15));

            Project::create([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }
}
