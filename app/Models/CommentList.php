<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentList extends BaseModel
{
    protected $table = 'comment_lists';

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];
}