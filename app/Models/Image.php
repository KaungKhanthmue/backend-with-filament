<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends BaseModel
{
    protected $table= 'images';
    
    protected $fillable = [
        'name',
        'path',
        'type',
        'imageable_id',
        'imageable_type'
    ];

    /***
     * Relationship
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo(Image::class,'imageable');
    }
}
