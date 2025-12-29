<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['state' => 'ORDER CANCELLED',      'description' => 'Order was cancelled and will not proceed.'],
            ['state' => 'ORDER DRAFT',          'description' => 'Order is being prepared and can be edited.'],
            ['state' => 'ORDER SUBMITTED',      'description' => 'Order was submitted to the supplier.'],
            ['state' => 'ORDER PENDING',        'description' => 'Order is waiting for supplier confirmation.'],
            ['state' => 'ARRIVED',              'description' => 'Order has arrived at the café.'],
            ['state' => 'ARRIVAL CHECK',        'description' => 'Order arrival is being checked with invoice.'],
            ['state' => 'ORDER CHECK',          'description' => 'Order is being verified before storage.'],
            ['state' => 'ORDER CLOSED',         'description' => 'Order is fully checked and closed.'],
            ['state' => 'IN STOCK',             'description' => 'Items are currently in stock.'],
            ['state' => 'STORED',               'description' => 'Items have been stored in their location.'],
            ['state' => 'SOLD',                 'description' => 'Items were sold.'],
            ['state' => 'REMOVED FROM STOCK',   'description' => 'Items were removed from stock.'],
            ['state' => 'DAMAGED',              'description' => 'Items were damaged.'],
            ['state' => 'EXPIRED',              'description' => 'Items expired and are no longer usable.'],
            ['state' => 'BROKEN',               'description' => 'Items were broken.'],
            ['state' => 'LOST',                 'description' => 'Items were lost or stolen.'],
            ['state' => 'REMOVED FROM CATALOG', 'description' => 'Item is no longer part of the catalog.'],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
