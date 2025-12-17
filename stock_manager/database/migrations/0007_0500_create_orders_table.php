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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('representative_id');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->date('order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('representative_id')->references('id')->on('representatives')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('restrict');

            // Indexes
            $table->index(['product_id', 'representative_id', 'team_id', 'invoice_id', 'status_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
