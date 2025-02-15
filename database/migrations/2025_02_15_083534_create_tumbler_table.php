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
        Schema::create('tumbler', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Product name
            $table->unsignedBigInteger('categories_id')->nullable(); // Foreign key for category
            $table->unsignedBigInteger('model_id')->nullable(); // Foreign key for model
            $table->decimal('price', 8, 2)->nullable(); // Product price
            $table->integer('stock')->nullable(); // Product stock
            $table->integer('rating')->nullable(); // Product rating
            $table->text('description')->nullable(); // Product description
            $table->boolean('is_available')->default(true)->nullable(); // Product availability
            $table->json('colors')->nullable(); // Store colors as JSON
            $table->json('sizes')->nullable(); // Store sizes as JSON
            $table->json('thumbnails')->nullable(); // Path to uploaded image
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('model_tumblers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumbler');
    }
};
