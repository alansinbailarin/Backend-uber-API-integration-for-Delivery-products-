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
        Schema::create('quote_u_r_l_s', function (Blueprint $table) {
            $table->id();

            $table->uuid('customer_uuid');
            $table->string('access_token');
            $table->timestamp('expires_at');
            $table->timestamp('expires_at_local')->nullable();

            $table->foreign('customer_uuid')
                ->references('uuid')
                ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_u_r_l_s');
    }
};
