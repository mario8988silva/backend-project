<?php

namespace Tests\Unit\Migrations;

class InvoiceMigrationTest extends BaseMigrationTest
{
    public function test_invoices_table_structure()
    {
        $this->assertTableExists('invoices');

        $this->assertTableColumns('invoices', [
            'id',
            'number',
            'issue_date',
            'due_date',
            'order_id',
            'supplier_id',
            'total_amount',
            'currency',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
