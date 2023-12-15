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
        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();

            $table->string('type');
            $table->string('address');
            $table->string('zip_code');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('country_id');

            $table->foreign('country_id')
                ->references('id')->on('countries')->onDelete('cascade');

            $table->unsignedBigInteger('state_id');

            $table->foreign('state_id')
                ->references('id')->on('states')->onDelete('cascade');

            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')
                ->references('id')->on('cities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_locations');
    }
};
