<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Genre;
use App\Book;
use App\Author;
use App\Jobs\CountBooks;
use App\Http\Controllers\Controller;
use App\Events\BookAdded;
use App\Policies\BookPolicy;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        
        return response()->json([
            'status' => true,
            'data' => $books
            ], 
        200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        extract($request->input());

        $author_record = Author::where('name', $author )->first();

        if ($author_record != null) {

            $author_id = $author_record->id;

        } else {

            $author_id = Author::create(['name' => $author])->id;
        }

        $genre_record = Genre::where('type', $genre)->first();

        if ($genre_record != null) {

            $genre_id = $genre_record->id;

        } else {

            $genre_id = Author::create(['type' => $genre])->id;
        }

        $book = Book::create([
            'title' => $title, 
            'user_id' => Auth::user()->id,
            'genre_id' => $genre_id,
            'author_id' => $author_id
        ]);

        event(new BookAdded($book));

        dispatch(new CountBooks(Auth::user()));

        return response()->json([
            'status' => true,
            'data' => 'Book was successfully stored.'
            ], 
        200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json([
            'status' => true,
            'data' => $book
            ], 
        200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        extract($request->input());



        $author_record = Author::where('name', $author )->first();

        if ($author_record != null) {

            $author_id = $author_record->id;

        } else {

            $author_id = Author::create(['name' => $author])->id;
        }

        $genre_record = Genre::where('type', $genre)->first();

        if ($genre_record != null) {

            $genre_id = $genre_record->id;

        } else {

            $genre_id = Author::create(['type' => $genre])->id;
        }


        $book->title = $title;

        $book->author_id = $author_id;

        $book->genre_id = $genre_id;

        $updated = $book->save();

        if (!$updated) {

            return response()->json([
                'status' => false,
                'message' => 'The book was not updated.'
                ], 
            200);
        }
        return response()->json([
            'status' => true,
            'message' => 'Book was successfully edited'
            ], 
        200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Book was successfully deleted'
            ], 
        200);

    }
}
