<?php

use App\Book;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelValidationTest extends TestCase
{
    /**
     * Does validate return false.
     *
     * @return void
     */
    public function testValidateWillReturnFalse()
    {
        $book = new Book();

        $validated = $book->validate(['e', 1, 1, 1]);

        $this->assertFalse($validated);
    }


}