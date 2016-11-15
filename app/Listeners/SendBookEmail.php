<?php

namespace App\Listeners;

use App\Events\BookAdded;
use App\Mail\YouAddedABook;
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
        $email = $book->user()->email;

        Mail::to($email)->queue(new YouAddedABook());
        
    }
}
