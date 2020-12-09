<?php
// info Created with 'php artisan make:model Permission -mc'
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

        // Allows Mass assignments.
    protected $guarded = [];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

     public function users(){
        return $this->belongsToMany(User::class);
    }

}
