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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('title','255')->nullable(false);
            $table->string('author','255')->nullable(false);
            $table->string('isbn','20')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->enum('condition', ['excellent', 'good', 'satisfactory', 'poor'])->default('good');
            $table->enum('status', ['available', 'reserved', 'exchanged'])->default('available');
            $table->string('image_path','500')->nullable();
            $table->year('published_year');
            $table->string('language','50')->default('Russian');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
