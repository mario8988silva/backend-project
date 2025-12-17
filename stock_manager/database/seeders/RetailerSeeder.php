<?php

namespace Database\Seeders;

use App\Models\Retailer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetailerSeeder extends Seeder
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

        Retailer::factory()->count(20)->create();
    }
}
