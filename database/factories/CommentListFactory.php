<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $post = Post::all();
        return [
            'post_id' => fake()->randomElement($post)->id,
            'user_id' => fake()->randomElement($users)->id,
            'comment' => fake()->text(50), 
        ];
    }
}