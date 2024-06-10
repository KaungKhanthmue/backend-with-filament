<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class NewFell extends BaseModel
{
    protected $table = 'new_fells';

    protected $fillable= [
        "description",
        "user_id"
    ];

    /**
     * Relationship
     */
    public function image():MorphOne
    {
        return $this->morphOne(Image::class,'imageable');
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
