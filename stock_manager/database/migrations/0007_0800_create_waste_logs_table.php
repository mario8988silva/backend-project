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
        Schema::create('waste_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->dateTime('logged_at')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('status_id')
                ->references('id')->on('statuses')
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
        Schema::dropIfExists('waste_logs');
    }
};
