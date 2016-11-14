<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    /** @type string $table **/
    protected $table = 'bookshelves';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
