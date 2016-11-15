<?php

namespace App\Listeners;

use App\Events\BookAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBookEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BookAdded  $event
     * @return void
     */
    public function handle(BookAdded $book)
    {
        var_dump($book);
    }
}
