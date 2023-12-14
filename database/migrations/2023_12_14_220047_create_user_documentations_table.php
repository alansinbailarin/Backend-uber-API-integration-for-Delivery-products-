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
        Schema::create('user_documentations', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('type');
            $table->string('file');
            $table->boolean('verified')->default(false);
            $table->string('verified_by')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_documentations');
    }
};
