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
        Schema::create('colors', function (Blueprint $table) {
            $table->id(); // int(11) with AUTO_INCREMENT
            $table->string('color_code', 255)->nullable();
            $table->string('color_name', 255)->nullable();
            $table->integer('r')->nullable();
            $table->integer('g')->nullable();
            $table->integer('b')->nullable();
            $table->string('product_type', 255)->nullable();
            $table->string('color_family', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
