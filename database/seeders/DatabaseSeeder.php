<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Age;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if (Age::count() > 0) {
            $this->command->info('Age table is not empty, skipping seeding.');
            return;
        }

        $this->call([
            DddSeeder::class,
            CitySeeder::class,
            PixTypeSeeder::class,
            AgeSeeder::class,
            CastrationSeeder::class,
            ObjectiveSeeder::class,
            SexSeeder::class,
            SizeSeeder::class,
            SpecieSeeder::class,
            BreedSeeder::class,
        ]);
    }
}
