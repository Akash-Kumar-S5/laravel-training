<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => function () {
                return Employee::factory()->create();
            },
            'basic_salary' => $this->faker->randomFloat(2, 2000, 8000),
            'allowances_description' => $this->faker->sentence,
            'allowances_amount' => $this->faker->randomFloat(2, 100, 500),
            'deductions_description' => $this->faker->sentence,
            'deductions_amount' => $this->faker->randomFloat(2, 50, 300),
            'net_salary' => $this->faker->randomFloat(2, 1800, 7800),
        ];
    }
}
