<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            "user_id"=> User::factory(),
            "title"=> $this->faker->sentence,
            "image"=> $this->faker->imageUrl(640, 480, 'post', true),
            "body"=> $this->faker->paragraph,
        ];
    }
}
