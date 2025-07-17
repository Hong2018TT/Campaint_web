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
        Schema::create('color_families', function (Blueprint $table) {
            $table->id(); // int(11) with AUTO_INCREMENT
            $table->string('name', 255)->nullable(); // varchar(255) with NOT NULL
            $table->string('name_kh', 255)->nullable(); // varchar(255) with NULL
            $table->string('color_code', 7)->nullable(); // varchar(7) with NULL
            $table->string('parent', 255)->nullable()->comment('Color Families (ប្រភេទពណ៌)'); // varchar(255) with NULL and comment
            $table->timestamps(); // creates created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_families');
    }
};
