<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Product tables related:
            FamilySeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            BrandSeeder::class,
            UnitTypeSeeder::class,
            IvaCategorySeeder::class,
            NutriScoreSeeder::class,
            EcoScoreSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
