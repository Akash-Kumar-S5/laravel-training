<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'post_name' => $this->faker->name,
            'post_description' => $this->faker->sentence,
            'post_image' => '3FIVU2nGPJREXO898WdidWBUo8j5fnOB9JLnXyN1.png'

        ];
    }
}
