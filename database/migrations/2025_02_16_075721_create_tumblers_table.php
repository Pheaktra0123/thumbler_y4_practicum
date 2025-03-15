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
        Schema::create('tumblers', function (Blueprint $table) {
            $table->id();
            $table->string('tumbler_name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->text('description');
            $table->boolean('is_available')->default(true)->nullable();
            $table->json('colors')->nullable()->nullable();
            $table->json('sizes')->nullable()->nullable();
            $table->json('thumbnails')->nullable();
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('model_tumblers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumblers');
    }
};
