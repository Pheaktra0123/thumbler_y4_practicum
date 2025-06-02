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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tracking_number')->unique()->nullable();
            $table->decimal('total', 10, 2);
            $table->text('shipping_address');
            $table->string('payment_method');
            $table->string('phone_number');
            $table->string('status')->default('pending'); // pending, processing, completed, cancelled
            $table->text('notes')->nullable();
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->string('coordinates')->nullable(); // For map-based orders
            $table->string('bank_slip_path')->nullable(); // For online payments
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
