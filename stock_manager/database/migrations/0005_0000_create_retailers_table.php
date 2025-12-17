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
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 45)->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('notes')->nullable();
            /*
            // DEVERÁ SER POSSIVEL ASSOCIAR ALGUMAS CATEGORIAS, PARA FACILITAR A EVENTUAL PESQUISA DE PRODUTOS PARA STOCK
            
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('category_family_id');
            $table->timestamps();

            $table->index(['category_id', 'category_family_id'], 'fk_retailer_category1_idx');
            $table->foreign(['category_id', 'category_family_id'])
                  ->references(['id', 'family_id'])
                  ->on('categories')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailers');
    }
};
