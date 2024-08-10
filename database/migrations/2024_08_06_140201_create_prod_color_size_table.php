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
        Schema::create('prod_color_size', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('prod_color_id');
                $table->unsignedBigInteger('size_id');
                $table->integer('quantity')->default(0);
                $table->timestamps();
    
                // Foreign key constraints
                $table->foreign('prod_color_id')->references('id')->on('prod_color')->onDelete('cascade');
                $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_color_size');
    }
};
