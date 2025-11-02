<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>  function () {
                return User::factory()->create()->assignRole('employee')->id;
            },
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber, // Use Faker's default phone number format
            'date_of_birth' => $this->faker->date, // Use Faker's default date format
            'address' => $this->faker->address,
        ];
    }
}
