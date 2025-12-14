<?php

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Unit',     'symbol' => 'u',  'description' => 'Single item'],
            ['name' => 'Gram',     'symbol' => 'g',  'description' => 'Weight in grams'],
            ['name' => 'Kilogram', 'symbol' => 'kg', 'description' => 'Weight in kilograms'],
            ['name' => 'Liter',    'symbol' => 'L',  'description' => 'Volume in liters'],
            ['name' => 'Milliliter', 'symbol' => 'mL', 'description' => 'Volume in milliliters'],
            ['name' => 'Meter',    'symbol' => 'm',  'description' => 'Length in meters'],
            ['name' => 'Square Meter', 'symbol' => 'm²', 'description' => 'Area in square meters'],
            ['name' => 'Cubic Meter', 'symbol' => 'm³', 'description' => 'Volume in cubic meters'],
        ];

        foreach ($units as $unit) {
            UnitType::create($unit);
        }
    }
}
