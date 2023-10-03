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
            $table->boolean('prominent');
            $table->string('title');
            $table->string('author_id');
            $table->string('genre_id');
            $table->text('image');
            $table->text('description');
            $table->integer('price');
            $table->integer('quantity');
            $table->softDeletes();
            // foeign key
            $table->timestamps();
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
