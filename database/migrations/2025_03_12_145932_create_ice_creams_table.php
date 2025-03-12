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
        Schema::create('ice_creams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('size', ['Small', 'Medium', 'Large'])->default('Medium');
            $table->decimal('price', 8, 2); // Example for price
            $table->string('flavor')->nullable(); // Optional flavor column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ice_creams');
    }
};
