<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable,HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'cover_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * R3lationship
     */

     public function posts(): HasMany
     {
         return $this->hasMany(Post::class);
     }

     public function friends(): BelongsToMany
     {
         return $this->belongsToMany(User::class, 'friend_lists', 'user_id', 'your_friend_id')
                     ->withTimestamps();
     }
     public function friendRequest(): BelongsToMany
     {
         return $this->belongsToMany(User::class, 'friend_lists', 'your_friend_id','user_id')
                     ->withTimestamps();
     }

     public function addFriend($friendId)
     {
         $ulid = (string) Str::ulid();
 
         $this->friends()->attach($friendId, ['id' => $ulid]);
     }

     public function likeUser(): BelongsToMany
     {
         return $this->belongsToMany(User::class,'like_lists')->withTimestamps();;
     }
     
     public function commentUser(): BelongsToMany
     {
         return $this->belongsToMany(User::class,'comment_lists')->withTimestamps();;
     }
}