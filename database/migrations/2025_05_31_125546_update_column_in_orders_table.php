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
        Schema::table('orders', function (Blueprint $table) {
            // Add a new 'tracking_number' column
            $table->string('tracking_number')->nullable()->after('status');
            // Add a new 'shipping_address' column
            $table->string('shipping_address')->nullable();
            // Add a new 'shipping_method' column
            $table->string('shipping_method')->nullable();
            // Add a new 'estimated_delivery_date' column
            $table->date('estimated_delivery_date')->nullable();
            // Add a new 'payment_status' column
            $table->string('payment_status')->nullable();
            // Add a new 'payment_method' column
            $table->string('payment_method')->nullable();
            // Add a new 'notes' column
            $table->text('notes')->nullable();
            // Add a new 'engraving' column
            $table->string('engraving')->nullable();
            // Add a new 'font' column
            $table->string('font')->nullable(); 
            // Add a new 'color' column
            $table->string('color')->nullable();
            // Add a new 'quantity' column
            $table->integer('quantity')->default(1);
            // Add a new 'image' column
            $table->string('image')->nullable();
            // Add a new 'customization_details' column
            $table->text('customization_details')->nullable();
            // Add a new 'is_customized' column
            $table->boolean('is_customized')->default(false);
            // Add a new 'created_by' column
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('delivery_date')->nullable();
            // Add a new 'cancellation_reason' column
            $table->text('cancellation_reason')->nullable();
            // Add a new 'cancellation_date' column
            $table->timestamp('cancellation_date')->nullable();
            //phone number
            $table->string('phone_number')->nullable();

            // Foreign key for deleted_by
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
