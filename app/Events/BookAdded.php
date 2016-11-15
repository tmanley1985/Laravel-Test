<?php

namespace App\Events;

use App\Book;
use Illuminate\Queue\SerializesModels;

class BookAdded
{
   use SerializesModels;

    /** @type App\Book $book */
    public $book;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }


}
