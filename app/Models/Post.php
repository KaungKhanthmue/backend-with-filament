<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends BaseModel
{
    protected $table="posts";

    protected $fillable = [
        'description',
        'user_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphMany
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function likePost(): BelongsToMany
    {
        return $this->BelongsToMany(Post::class,'like_lists')->withTimestamps();
    }

    public function like($userId)
    {
        $ulid = (string) str::ulid();
         LikeList::create([
            'post_id' => $this->id,
            'user_id' => $userId,
        ]);
    }
    public function unLike($userId)
    {

        $ulid = (string) str::ulid();
        LikeList::where('user_id', $userId)->where('post_id',$this->id)->first()->delete();
    }
}