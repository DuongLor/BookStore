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
		Schema::create('invoice_detail', function (Blueprint $table) {
			$table->id();
			$table->integer('invoice_id');
			$table->integer('book_id');
			$table->integer('quantity');
			$table->string('discount');
			$table->string('price');
			$table->decimal('total', 10, 0); // Trường price (giá)
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('invoice_detail');
	}
};
