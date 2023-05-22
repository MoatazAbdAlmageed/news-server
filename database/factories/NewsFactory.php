<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author' => $this->faker->firstName,
            'title' => $this->faker->firstName,
            'description' => $this->faker->firstName,
            'url' => $this->faker->firstName,
            'content' => $this->faker->firstName,
        ];
    }
}
