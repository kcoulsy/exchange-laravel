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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('price');
            $table->boolean('is_por');
            $table->string('slug');
            $table->string('description');
            $table->string('model');
            $table->string('location');
            $table->foreignId('currency_id')->references('id')->on('currencies');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('condition_id')->references('id')->on('conditions');
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('listings', function (Blueprint $table) {
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
