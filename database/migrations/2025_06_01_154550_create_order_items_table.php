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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('tumbler_id')->nullable();
            $table->foreign('tumbler_id')->references('id')->on('tumblers')->onDelete('set null');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->string('engraving')->nullable();
            $table->string('font')->nullable();
            $table->boolean('is_customized')->default(false);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
