<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\InvoiceSeeder;

class InvoiceSeederTest extends BaseSeederTest
{
    public function test_invoice_seeder_populates_table()
    {
        $this->runSeeder(InvoiceSeeder::class);

        $this->assertTableHasRows('invoices', 20);

        $this->assertColumnsNotNull('invoices', ['number']);
    }
}
