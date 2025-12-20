<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class WasteLogMigrationTest extends BaseMigrationTest
{
    public function test_waste_logs_table_structure()
    {
        $this->assertTableExists('waste_logs');

        $this->assertTableColumns('waste_logs', [
            'id',
            'product_id',
            'quantity',
            'logged_at',
            'status_id',
            'order_id',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
