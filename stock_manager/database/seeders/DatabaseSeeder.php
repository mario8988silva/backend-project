<?php

namespace Database\Seeders;

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
            // Users tables related:
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,

            // Products tables related:
            FamilySeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            BrandSeeder::class,
            UnitTypeSeeder::class,
            IvaCategorySeeder::class,
            NutriScoreSeeder::class,
            EcoScoreSeeder::class,
            ProductSeeder::class,

            // Suppliers tables related:
            SupplierSeeder::class,
            CategoryHasSupplierSeeder::class,
            RepresentativeSeeder::class,
            InvoiceSeeder::class,

            // Orders & Stock tables related:
            StatusSeeder::class,
            LocationSeeder::class,
            OrderSeeder::class,
            OrderHasProductSeeder::class,
            StockSeeder::class,
            WasteLogSeeder::class,
            SoldProductSeeder::class,
        ]);
    }
}
