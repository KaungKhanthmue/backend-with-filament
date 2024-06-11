<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendList extends BaseModel
{
    protected $table = 'friend_lists';
    
    protected $fillable = [
        'user_id',
        'your_friend_id',
    ];
}
