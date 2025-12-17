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
       Schema::create('nutri_scores', function (Blueprint $table) {
        $table->id();
        $table->char('grade', 1); // A, B, C, D, E
        $table->string('color', 20); // 'Green', 'Yellow', 'Orange', 'Red'
        $table->string('description', 255)->nullable(); // optional notes
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutri_scores');
    }
};
