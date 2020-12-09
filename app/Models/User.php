<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        # Encrypts passwords
        $this->attributes['password'] = bcrypt($value);
    }

    // Info This tells makes the user have many posts relationship
    /**
     * @var mixed
     */
    private $id;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

     public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function userHasRole($role_name)
    {
        # Checks to see if a user has a role
        foreach($this->roles as $role){
            if($role_name == $role->name)
            return true;
        }
    }
}
