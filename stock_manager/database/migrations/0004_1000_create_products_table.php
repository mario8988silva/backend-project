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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('barcode', 45)->unique()->nullable(); // optional unique barcode
            $table->string('name', 255); // product name
            $table->string('image', 255)->nullable(); // optional product image url
            $table->text('description')->nullable(); // optional product description

            // Foreign keys
            $table->foreignId('unit_type_id')->nullable()->constrained('unit_types')->nullOnDelete();
            $table->foreignId('iva_category_id')->nullable()->constrained('iva_categories')->nullOnDelete();

            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories')->nullOnDelete();

            $table->foreignId('nutri_score_id')->nullable()->constrained('nutri_scores')->nullOnDelete();
            $table->foreignId('eco_score_id')->nullable()->constrained('eco_scores')->nullOnDelete();

            // Attributes            
            $table->boolean('sugar_free')->default(false);
            $table->boolean('gluten_free')->default(false);
            $table->boolean('lactose_free')->default(false);
            $table->boolean('vegan')->default(false);
            $table->boolean('vegetarian')->default(false);
            $table->boolean('organic')->default(false);

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
