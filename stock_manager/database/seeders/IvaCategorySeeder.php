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
        // Common Portuguese IVA categories
        $ivaRates = [
            ['name' => 'Standard',     'rate' => 23.00, 'description' => 'Standard VAT rate'],
            ['name' => 'Intermediate', 'rate' => 13.00, 'description' => 'Intermediate VAT rate'],
            ['name' => 'Reduced',      'rate' => 6.00,  'description' => 'Reduced VAT rate'],
            ['name' => 'Exempt',       'rate' => 0.00,  'description' => 'Exempt from VAT'],
        ];
        foreach ($ivaRates as $ivaRate) {
            IvaCategory::create($ivaRate);
        }
    }
}