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
        Schema::create('sold_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Core fields
            $table->unsignedInteger('quantity')->default(1); // how many units sold
            $table->decimal('price', 10, 2)->nullable();     // unit price at sale time
            $table->decimal('total', 12, 2)->nullable();     // total sale amount
            $table->dateTime('sold_at')->nullable();         // when the sale happened
            $table->string('location')->nullable();          // store, café, warehouse
            $table->text('notes')->nullable();               // optional comments

            // Foreign keys
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('order_id')
                ->nullable()
                ->constrained('orders')
                ->cascadeOnUpdate()
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_products');
    }
};
