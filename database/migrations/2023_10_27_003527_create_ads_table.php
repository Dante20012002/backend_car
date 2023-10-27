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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->double('price');
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->string('model');
            $table->string('anio');
            $table->string('ubication');
            $table->string('latitude');
            $table->string('altitude');
            $table->string('url_image');
            $table->string('car_detail');
            $table->timestamps();
            $table->enum('status', ['active','innactive']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
