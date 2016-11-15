<?php

use App\Book;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{

    /**
     * Tests whether book will return user.
     *
     * @return void
     */
    public function testWillReturnUser()
    {
        $user = Book::find(1)->user;

        $this->assertInstanceOf('App\User', $user);
    }

}