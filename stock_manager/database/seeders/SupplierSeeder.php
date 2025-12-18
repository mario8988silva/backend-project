<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $categories = \App\Models\Category::pluck('id')->toArray();
        
        Retailer::factory()->count(20)->create()->each(function ($retailer) use ($categories) {
            $retailer->categories()->attach(fake()->randomElements($categories, rand(1, 3)));
        });
        */

        Supplier::factory()->count(20)->create();
    }
}
