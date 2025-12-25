<?php

namespace Database\Seeders;

use App\Models\WasteLog;
use Illuminate\Database\Seeder;


class WasteLogSeeder extends Seeder
{
    public function run(): void
    {
        WasteLog::factory()->count(30)->create();

    }
}
