<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DonorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'blood_type' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'contact_number' => $this->faker->phoneNumber,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
