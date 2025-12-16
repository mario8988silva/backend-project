<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('retailer_id');
            $table->timestamps();

            $table->index('order_id', 'fk_invoice_order1_idx');
            $table->index('retailer_id', 'fk_invoice_retailer1_idx');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('retailer_id')
                ->references('id')
                ->on('retailers')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
