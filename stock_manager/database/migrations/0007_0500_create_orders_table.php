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

            $table->unsignedBigInteger('representative_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('status_id');


            $table->timestamps();

            // Foreign keys
            $table->foreign('representative_id')
                ->references('id')->on('representatives')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->foreign('status_id')
                ->references('id')->on('statuses')
                ->cascadeOnUpdate()->restrictOnDelete();
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
