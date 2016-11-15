<?php

namespace App;

use App\Elegant;
use Illuminate\Database\Eloquent\Model;

class Genre extends Elegant
{
	 /** @type array $rules */

    protected $rules = array(
        'type' => 'required|alpha|min:3',
        
    );

    /**
     * Returns the genre's books.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
