<?php

namespace Database\Seeders;

use App\Models\CategoryHasSupplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryHasSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryHasSupplier::factory()->count(50)->create();

    }
}
