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
            $table->timestamps();

            $table->unsignedInteger('quantity');
            $table->dateTime('logged_at')->nullable();
            $table->text('notes')->nullable();

            //
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('status_id')
                ->nullable()
                ->constrained('statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('order_id')
                ->nullable()
                ->constrained('orders')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
