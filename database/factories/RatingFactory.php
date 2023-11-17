<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
		public function definition() 
		{
			return [
				'rating' => $this->faker->numberBetween(1, 5),
				'book_id' => $this->faker->numberBetween(1, 30),
				'user_id' => 1,
				'comment' => 'Lorem ipsum dolor sit amet',
			];
		}
}
