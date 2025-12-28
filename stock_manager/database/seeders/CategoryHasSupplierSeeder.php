<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\CategoryHasSupplier;
use Illuminate\Database\Seeder;

class CategoryHasSupplierSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();
        $suppliers  = Supplier::pluck('id')->toArray();

        $pairs = [];

        while (count($pairs) < 50) {
            $categoryId = fake()->randomElement($categories);
            $supplierId = fake()->randomElement($suppliers);

            $key = $categoryId . '-' . $supplierId;

            if (!isset($pairs[$key])) {
                $pairs[$key] = true;

                CategoryHasSupplier::create([
                    'category_id' => $categoryId,
                    'supplier_id' => $supplierId,
                ]);
            }
        }
    }
}
