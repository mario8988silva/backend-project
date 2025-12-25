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
            $table->timestamps();

            $table->unsignedInteger('quantity');
            $table->enum('movement_type', ['in', 'out']);
            $table->dateTime('moved_at')->nullable();
            $table->text('notes')->nullable();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('order_id')
                ->nullable()
                ->constrained('orders')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('stock_id')
                ->nullable()
                ->constrained('stocks')
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
