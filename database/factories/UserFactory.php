<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
		public function definition()
		{
			return [
				'name' => $this->faker->name,
				'email' => 'admin@gmail.com',
				'email_verified_at' => now(),
				'password' => '123', // password
				'role' => 1
			];
		}
}
