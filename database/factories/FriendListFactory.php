<?php

namespace Database\Factories;

use App\Models\FriendList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FriendList>
 */
class FriendListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Retrieve random user IDs
        $userIds = User::pluck('id')->toArray();
        $userId = $this->faker->randomElement($userIds);
        $friendId = $this->faker->randomElement(array_diff($userIds, [$userId])); // Ensure friendId is different from userId

        // Check for existing pairs to ensure uniqueness
        while (FriendList::where('user_id', $userId)
                        ->where('your_friend_id', $friendId)
                        ->exists()) {
            $userId = $this->faker->randomElement($userIds);
            $friendId = $this->faker->randomElement(array_diff($userIds, [$userId]));
        }

        return [
            'user_id' => $userId,
            'your_friend_id' => $friendId,
        ];
    }
}