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
            ['state' => 'ORDER', 'description' => 'creates order list'],
            ['state' => 'ORDER PENDING', 'description' => 'waiting for supplier visit'],
            ['state' => 'ORDER MADE', 'description' => 'confirms supplier received order'],
            ['state' => 'SUPPLIER', 'description' => 'out of our control / order pending'],
            ['state' => 'ARRIVAL', 'description' => 'order arrives'],
            ['state' => 'ARRIVAL CHECK', 'description' => 'confirms order arrived with invoice and was paid'],
            ['state' => 'ORDER CHECK', 'description' => 'order is waiting to be checked and to be stored'],
            ['state' => 'ORDER CLOSED', 'description' => 'order is checked. closes this order'],
            ['state' => 'IN STOCK', 'description' => 'all products in stock and where they are'],
            ['state' => 'STORED', 'description' => 'if products are stored. Links product to a physical place.'],
            ['state' => 'SOLD', 'description' => 'sold items and how many of each.'],
            ['state' => 'LOST', 'description' => 'sometimes items are lost, broken, stolen.'],
        ];

        foreach ($statuses as $status) {
            Status::create(['name' => $status]);
        }
    }
}