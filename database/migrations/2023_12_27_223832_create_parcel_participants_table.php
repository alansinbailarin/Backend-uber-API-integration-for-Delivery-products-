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
        Schema::create('parcel_participants', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['sender', 'recipient'])->default('sender');
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->integer('age')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');

            $table->unsignedBigInteger('parcel_id');

            $table->foreign('parcel_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcel_participants');
    }
};
