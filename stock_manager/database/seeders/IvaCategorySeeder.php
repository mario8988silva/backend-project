<?php

namespace Database\Seeders;

use App\Models\IvaCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IvaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IvaCategory::factory()->count(4)->create();
    }
}
