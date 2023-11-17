<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
		public function definition()
		{
			return [
				'discount' => $this->faker->numberBetween(5, 50),
				'start_date' => $this->faker->dateTimeBetween('-1 months', 'now'),
				'end_date' => $this->faker->dateTimeBetween('now', '+3 months')
			];
		}
}
