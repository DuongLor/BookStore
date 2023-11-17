<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
		public function run()
		{
			\App\Models\Genre::factory()->count(4)->create();  
		}
}
