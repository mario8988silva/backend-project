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
            // Core fields
            $table->unsignedBigInteger('product_id');        // link to product
            $table->unsignedBigInteger('order_id')->nullable(); // optional link to order
            $table->unsignedInteger('quantity')->default(1); // how many units sold
            $table->decimal('price', 10, 2)->nullable();     // unit price at sale time
            $table->decimal('total', 12, 2)->nullable();     // total sale amount
            $table->dateTime('sold_at')->nullable();         // when the sale happened
            $table->string('location')->nullable();          // store, café, warehouse
            $table->text('notes')->nullable();               // optional comments

            $table->timestamps();
            
            // Foreign keys
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onUpdate('cascade')->onDelete('set null');
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
