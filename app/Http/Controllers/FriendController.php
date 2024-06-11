<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    
    public function friend_add($yourFriendId)
    {
        $user = User::first();

        $user->addFriend($yourFriendId);
        return 'success';
    }
}
