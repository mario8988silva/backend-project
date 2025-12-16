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
        Schema::create('representatives', function (Blueprint $table) {
            $table->id(); // auto-increment PK
            $table->string('name');
            $table->string('phone', 45)->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('retailer_id');
            $table->timestamps();

            $table->index('retailer_id', 'fk_representative_retailer1_idx');
            $table->foreign('retailer_id')
                ->references('id')
                ->on('retailers')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representatives');
    }
};
