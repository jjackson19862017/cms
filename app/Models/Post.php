<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // Allows Mass assignments.
    protected $guarded = [];

    use HasFactory;
    // Info This creates a relationship with users
    public function user(){
        return $this->belongsTo(User::class);
    }


}
