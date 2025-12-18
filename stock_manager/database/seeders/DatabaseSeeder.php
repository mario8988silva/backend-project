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
            // User tables related:
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,

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

            // Retailer tables related:
            SupplierSeeder::class,
            CategoryHasSupplierSeeder::class,
            RepresentativeSeeder::class,
            InvoiceSeeder::class,

            // Order & Stock tables related:
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
