<?php

namespace App;

use App\Elegant;
use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Elegant
{
    /** @type string $table **/
    protected $table = 'bookshelves';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'user_id'];

     /** @type array $rules */

    protected $rules = array(
        'title' => 'required|alpha|min:3',
        'user_id'  => 'required|numeric',
        
    );


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
