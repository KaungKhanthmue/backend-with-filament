<?php

namespace Database\Seeders;

use App\Models\FriendList;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $usersList = User::factory(10)->create();
        FriendList::factory(30)->create();

       $admin =  User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
        $users = User::inRandomOrder()->take(10)->get();
        foreach($users as $user)
        {
            FriendList::create([
                'user_id' => $user->id,
                'your_friend_id' => $admin->id,
            ]);
        }

        foreach($users as $user)
        {
            $post = Post::create([
                'description' => 'test',
                'user_id' => $user->id,
            ]);
    
 
            $post->image()->create([
                'name' => fake()->word, 
                'path' => fake()->imageUrl(640, 480, 'posts', true, 'post fixtures'),
                'type' => 'post_image',
            ]);
        }


        
    }
}