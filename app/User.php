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
        'first_name', 'last_name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Scope a query to grab users with name passed in..
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $first_name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFirstName($query, $first_name)
    {
        return $query->where('first_name', $first_name);
    }
}
