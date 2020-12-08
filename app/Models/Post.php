<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    // Allows Mass assignments.
    protected $guarded = [];

    use HasFactory;
    // Info This creates a relationship with users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // info Mutator
    public function setPostImageAttribute($value){ // info follow the convention of lowercase then capitals
            $this->attributes['post_image'] = asset($value);
        }
    // info accessor
    public function getPostImageAttribute($value): string
    {
        return asset($value);
    }
}
