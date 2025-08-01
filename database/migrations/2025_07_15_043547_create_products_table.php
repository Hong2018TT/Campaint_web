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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id'); // This is a typical way to make an auto-incrementing primary key named 'product_id'
            $table->string('Name_EN', 255)->nullable();
            $table->string('Name_KH', 255)->nullable();
            $table->string('brand', 255)->nullable();
            $table->decimal('price_after_discount', 10, 2)->nullable();
            $table->decimal('discount_percent', 5, 2)->nullable();
            $table->integer('discount_percent')->default(0); // Integer for percentage
            $table->string('color_type', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->text('image_url')->nullable();
            $table->text('image_slide1')->nullable();
            $table->text('image_slide2')->nullable();
            $table->text('image_slide3')->nullable();
            $table->text('image_slide4')->nullable();
            $table->longText('description')->nullable();
            $table->string('delivery_option', 255)->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
