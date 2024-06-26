<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeList extends BaseModel
{
    protected $table = 'like_lists';

    protected $fillable = [
        'post_id',
        'user_id',
    ];
}