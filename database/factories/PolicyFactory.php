<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::upper(Str::random(10)), // Generate a random unique code
            'plan_reference' => $this->faker->word(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'investment_house' => $this->faker->company(),
            'last_operation' => $this->faker->date(),
            'staff_user_id' => User::factory(), // Create a user for this policy
        ];
    }
}
