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
    protected $fillable = ['title', 'user_id'];


    /**
     * Returns the bookshelf's user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Returns the bookshelf's user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_bookshelves', 'bookshelves_id', 'books_id');
    }
}
