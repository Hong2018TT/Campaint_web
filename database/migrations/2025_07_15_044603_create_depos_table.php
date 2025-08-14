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
        Schema::create('depos', function (Blueprint $table) {
            $table->id(); // creates an auto-incrementing unsigned bigint primary key named 'id'
            $table->string('Name_EN', 255)->nullable();
            $table->string('Name_KH', 255)->nullable();
            $table->text('Address_EN')->nullable();
            $table->string('province_EN', 255)->nullable();
            $table->text('Address_KH')->nullable();
            $table->string('province_KH', 255)->nullable();
            $table->string('Phone', 15)->nullable();
            $table->string('GPS', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depos');
    }
};
