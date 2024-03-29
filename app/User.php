<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','address', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
