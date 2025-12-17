<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define fixed Status:
        $statuses = [
            ['state' => 'x', 'description' => 'a'],
            ['state' => 'y', 'description' => 'b'],
            ['state' => 'z', 'description' => 'c'],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}

/*
ORDER IN COURSE
ORDER MADE
ORDER PENDING
ORDER ARRIVED
ORDER CHECKED
ORDER CLOSED
IN WAREHOUSE
IN STORE
SOLD
LOST
*/