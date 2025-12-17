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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();

            // Core fields
            $table->unsignedBigInteger('product_id');             // link to product
            $table->unsignedBigInteger('ordered_product_id')->nullable(); // optional link to ordered product
            $table->unsignedBigInteger('status_id');              // link to status (available, reserved, etc.)
            $table->unsignedInteger('quantity')->default(0);      // how many units
            $table->string('location')->nullable();               // optional warehouse/shelf/café location

            $table->timestamps();

            // Foreign keys
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('ordered_product_id')
                ->references('id')->on('ordered_products')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('status_id')
                ->references('id')->on('statuses')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
