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
        Schema::create('model_tumblers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('Thumbnail')->nullable();
            
            // Add the category_id column
            $table->unsignedBigInteger('category_id')->nullable();
            
            // Define the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_tumblers');
    }
};
