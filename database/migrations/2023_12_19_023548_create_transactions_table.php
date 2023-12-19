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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->uuid('transaction_code');
            // Amount
            $table->decimal('amount', 10, 2);
            // Payment status
            $table->string('payment_status')->default('pending');
            $table->string('delivery_status')->default('pending');
            $table->string('tracking_url')->nullable();
            // Pickup
            $table->string('pickup_address')->nullable();
            $table->string('pickup_name')->nullable();
            $table->string('pickup_phone_number')->nullable();
            // pickup latitute and longitude
            $table->decimal('pickup_latitude', 10, 8)->nullable();
            $table->decimal('pickup_longitude', 11, 8)->nullable();
            $table->string('dropoff_address')->nullable();
            $table->string('dropoff_name')->nullable();
            $table->string('dropoff_phone_number')->nullable();
            // dropoff latitute and longitude
            $table->decimal('dropoff_latitude', 10, 8)->nullable();
            $table->decimal('dropoff_longitude', 11, 8)->nullable();

            $table->string('confirmation_image')->nullable();
            $table->string('confirmation_buyer');
            $table->string('confirmation_seller');

            $table->unsignedBigInteger('buyer_id');

            $table->foreign('buyer_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('seller_id');

            $table->foreign('seller_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('item_id');

            $table->foreign('item_id')
                ->references('id')->on('items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
