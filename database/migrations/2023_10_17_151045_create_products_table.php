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
        Schema::create('product', function (Blueprint $table) {
             $table->increments('id');
            $table->string('name')->unique();
            $table->float('price');
            $table->float('sale_price')->nullable();
            $table->string('image');
            $table->unsignedInteger('category_id');
            $table->tinyInteger('status')->default('1');
            $table->text('description');
            $table->string('gender')->default('unisex');
            $table->foreign('category_id')->references('id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
