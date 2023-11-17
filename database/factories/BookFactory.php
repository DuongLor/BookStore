<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
		public function definition() 
		{
			return [
				'prominent' => $this->faker->boolean,
				'title' => $this->faker->sentence,
				'author_id' => $this->faker->numberBetween(1, 10),
				'genre_id' => $this->faker->numberBetween(1, 4),
				'promotion_id' => $this->faker->numberBetween(1, 3),
				'image' => fake()->imageUrl(),
				'description' => 'Lorem ipsum dolor sit amet',
				'price' => $this->faker->numberBetween(10000, 100000),
				'quantity' => $this->faker->numberBetween(10, 50), 
			];
		}
}
