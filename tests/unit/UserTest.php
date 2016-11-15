<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Does user have first name scope.
     *
     * @return void
     */
    public function testUserHasFirstNameQueryScope()
    {
        $user = User::find(1);

        $firstName = $user->firstName('Thomas');

        $this->assertNotNull($firstName, 'Thomas');
    }

    /**
     * Does the user return it's books.
     *
     * @return void
     */
    public function testUserWillReturnBooks()
    {
        $user = User::find(1);

        $books = $user->books();

        $this->assertNotNull($books);
    }
}