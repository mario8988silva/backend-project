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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->enum('movement_type', ['in', 'out']);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->dateTime('moved_at')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreign('stock_id')
                ->references('id')->on('stocks')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
