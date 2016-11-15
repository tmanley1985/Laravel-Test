<?php

namespace App;

use App\Elegant;

class Book extends Elegant
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'user_id', 'author_id', 'genre_id'];

    /** @type array $rules */

    protected $rules = array(
        'title' => 'notNull|regex:/^[A-Za-z0-9]+$/|min:3',
        'user_id'  => 'required|numeric',
        'author_id'  => 'required|numeric',
        'genre_id'  => 'required|numeric',
        
    );

    /**
     * Returns the book's user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Returns the book's author.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    /**
     * Returns the book's favorites.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany('App\Favorite', 'favoritable');
    }

    /**
     * Returns the book's genre.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    /**
     * Returns the book's parent bookshelves.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookshelves()
    {
        return $this->belongsToMany('App\Bookshelf', 'books_bookshelves', 'books_id','bookshelves_id');
    }
}
