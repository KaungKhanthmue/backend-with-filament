<?php

namespace Database\Seeders;

use App\Models\CommentList;
use App\Models\FriendList;
use App\Models\LikeList;
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
        $one =  User::factory()->create([
            'name' => 'one',
            'email' => 'one@gmail.com',
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
    
            $images =[
                'post/cv2.jpg',
                'post/cv3.jpg',
                'post/cv4.jpg',
                'post/cv5.jpg',
            ];
            foreach($images as $image)
            {
                $post->image()->create([
                    'name' => fake()->word, 
                    'path' => $image,
                    'type' => 'post_image',
                ]);
            }

        }
        LikeList::factory(30)->create();
        CommentList::factory(30)->create();


        
    }
}