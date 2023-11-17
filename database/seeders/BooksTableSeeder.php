<?php

namespace Database\Seeders;

use App\Models\book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
		public function run()
		{
			book::factory()->count(30)->create();
		}
}
