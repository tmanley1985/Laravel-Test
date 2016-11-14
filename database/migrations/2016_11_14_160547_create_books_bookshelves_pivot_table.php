<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksBookshelvesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_bookshelves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('books_id')->unsigned();
            $table->integer('bookshelves_id')->unsigned();
            $table->timestamps();

            $table->foreign('books_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('bookshelves_id')->references('id')->on('bookshelves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_bookshelves');
    }
}
