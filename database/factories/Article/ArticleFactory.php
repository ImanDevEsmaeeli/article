<?php

namespace Database\Factories\Article;

use App\Enums\Article\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->title(),
            'body'=>fake()->sentence(),
            'status'=>fake()->randomElement(Status::values()),
            'user_id'=>fake()->numberBetween(16,25),
        ];
    }
}
