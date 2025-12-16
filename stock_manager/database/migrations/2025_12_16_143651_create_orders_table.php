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
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('representative_id');
            $table->unsignedBigInteger('team_id');
            $table->date('order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('product_status_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('representative_id')->references('id')->on('representatives')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('product_status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('restrict');
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
