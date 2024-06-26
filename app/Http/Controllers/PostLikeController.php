<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function index()
    {

    }

    public function show($postId)
    {

    }

    public function likeUnLike($postId)
    {
        $post = Post::findOrFail($postId);
        $user= User::find(auth()->user()->id);
        $hasLiked = $user->likeUser()->wherePivot('post_id', $post->id)->exists();
        if($hasLiked){
            $post->unLike($user->id);
            return response()->json([
                'message' => 'Unliked post'
            ]);
        }
        else{

            $post->like($user->id);
            return response()->json([
                'message' => 'Liked post'
            ]);
        }
    }
}