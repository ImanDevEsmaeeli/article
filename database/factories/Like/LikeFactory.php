<?php

namespace Database\Factories\Like;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status'=>fake()->boolean(),
            'user_id'=>fake()->numberBetween(16,25),
            'article_id'=>fake()->numberBetween(1,8),
        ];
    }
}
