<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->string('title');
        $table->integer('author_id')->unsigned();
        $table->integer('genre_id')->unsigned();
        $table->rememberToken();
        $table->timestamps();

        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        $table->foreign('genre_id')->references('id')->on('generes')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
