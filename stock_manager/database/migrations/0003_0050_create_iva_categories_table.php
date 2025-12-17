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
        Schema::create('iva_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); // 'Standard', 'Reduced', 'Intermediate', 'Exempt'
            $table->decimal('rate', 5, 2); // 23.00, 13.00, 6.00
            $table->string('description', 255)->nullable(); // optional, for notes
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iva_categories');
    }
};
