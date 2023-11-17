<?php

namespace Database\Seeders;

use App\Models\rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
		public function run()
		{
			rating::factory()->count(200)->create();  
		}
}
