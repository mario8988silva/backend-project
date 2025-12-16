<?php

namespace Database\Seeders;

use App\Models\WasteLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WasteLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WasteLog::factory()->count(30)->create();
    }
}
