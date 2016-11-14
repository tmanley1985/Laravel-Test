<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     /**
     * Determine if the given book can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return bool
     */
    public function update(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }
}
