<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donor_id' => $this->faker->randomElement([5, 6, 7]),
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => $this->faker->optional()->text,
        ];
    }
}
