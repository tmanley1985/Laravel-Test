<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiConsumer extends Model
{
  	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'api_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'secret',
    ];


}
