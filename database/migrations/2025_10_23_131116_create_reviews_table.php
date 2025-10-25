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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable(false)->comment('кто оставил отзыв');
            $table->unsignedBigInteger('user_id')->nullable(false)->comment('кому оставили отзыв');
            $table->unsignedBigInteger('exchange_id')->nullable(false);
            $table->unsignedTinyInteger('rating')->nullable(false);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exchange_id')->references('id')->on('exchanges');

            $table->unique(['exchange_id', 'author_id'], 'unique_exchange_review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
