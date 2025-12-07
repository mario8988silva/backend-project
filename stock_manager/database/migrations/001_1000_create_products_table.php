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
            $table->id(); // auto-increment primary key

            $table->string('barcode', 45)->unique()->nullable(); // optional unique barcode
            $table->string('name', 255); // product name
            $table->string('image', 255)->nullable(); // optional product image url
            $table->text('description')->nullable(); // optional product description

            // Foreign keys
            $table->foreignId('unit_type_id')->constrained('unit_types')->nullable();
            $table->foreignId('iva_category_id')->constrained('iva_categories')->nullable();
            
            $table->foreignId('brand_id')->constrained('brands')->nullable();
            $table->foreignId('subcategory_id')->constrained('subcategories')->nullable();            
            
            $table->foreignId('nutri_score_id')->constrained('nutri_scores')->nullable();
            $table->foreignId('eco_score_id')->constrained('eco_scores')->nullable();

            // Attributes
            $table->date('expiry_date')->nullable();
            
            $table->boolean('sugar_free')->nullable();
            $table->boolean('gluten_free')->nullable();
            $table->boolean('lactose_free')->nullable();
            $table->boolean('vegan')->nullable();
            $table->boolean('vegetarian')->nullable();
            $table->boolean('organic')->nullable();

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
