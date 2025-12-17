<?php

namespace Database\Seeders;

use App\Models\SoldProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoldProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoldProduct::factory()->count(50)->create();
    }
}
