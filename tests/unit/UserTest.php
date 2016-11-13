<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testUserHasFirstNameQueryScope()
    {
        $user = User::find(1);

        $firstName = $user->firstName('Thomas');

        $this->assertNotNull($firstName);
    }
}