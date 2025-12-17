<?php

namespace Database\Seeders;

use App\Models\Representative;
use App\Models\Retailer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $retailers = Retailer::all();

        foreach ($retailers as $retailer) {
            Representative::factory()->count(rand(1, 3))->create([
                'retailer_id' => $retailer->id,
            ]);
        }
    }
}
