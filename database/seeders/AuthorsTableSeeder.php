<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		\App\Models\Author::factory()->count(10)->create();
	}
}
