<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => DB::table('users')->pluck('id')->random(),
            'title' => fake()->word(),
            'body' => fake()->paragraph,
            'published_at' => fake()->dateTimeInInterval(now(), '-20 years', 'Asia/Kolkata'),
        ];
    }
}
