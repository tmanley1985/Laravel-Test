<?php

namespace App\Http\Controllers\Api;

use Log;
use Auth;
use App\Genre;
use App\Book;
use App\Author;
use App\Jobs\CountBooks;
use App\ApiConsumer as Consumer;
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
    public function index(Request $request)
    {
        extract($request->input());


        $authenticated = $this->validateConsumer([
            'api_key' => $api_key,
            'data' => $data,
            'hashed' => $hashed
        ]);

        if ($authenticated == false) {

            return response()->json([
                'status' => false,
                'message' => 'You do not have access to this resource!'

            ], 200);
        }
        $books = Book::all();
        
        return response()->json([
            'status' => true,
            'data' => $books
            ], 
        200);
    }

    /**
     * Validates the incoming request.
     * 
     * @param  array $consumer_info Array of api_key, data, hashed data.
     * 
     * @return bool
     */
    public function validateConsumer($consumer_info)
    {
        extract($consumer_info);

        // Find the consumer using their api key.
        $consumer = Consumer::where('api_key', $api_key)->first();

        // Get the secret.
        $secret = $consumer->secret;
        // use sha256 to hash the data with their secret.

        $newly_hashed_data = hash_hmac('sha256', $data, $secret);

        // Return false if the newly hashed data is not the same as the hashed data sent along
        
        if ($newly_hashed_data != $hashed) {
            return false;
        }

        return true;
        
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


        $authenticated = $this->validateConsumer([
            'api_key' => $api_key,
            'data' => $data,
            'hashed' => $hashed
        ]);

        if ($authenticated == false) {

            return response()->json([
                'status' => false,
                'message' => 'You do not have access to this resource!'

            ], 200);
        }

        extract(json_decode($data, true));
        

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
            'user_id' => $user_id,
            'genre_id' => $genre_id,
            'author_id' => $author_id
        ]);

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
    public function show(Request $request, Book $book)
    {
        extract($request->input());

         $authenticated = $this->validateConsumer([
            'api_key' => $api_key,
            'data' => $data,
            'hashed' => $hashed
        ]);

        if ($authenticated == false) {

            return response()->json([
                'status' => false,
                'message' => 'You do not have access to this resource!'

            ], 200);
        }

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

        $authenticated = $this->validateConsumer([
            'api_key' => $api_key,
            'data' => $data,
            'hashed' => $hashed
        ]);

        if ($authenticated == false) {

            return response()->json([
                'status' => false,
                'message' => 'You do not have access to this resource!'

            ], 200);
        }

        extract(json_decode($data, true));

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
        $authenticated = $this->validateConsumer([
            'api_key' => $api_key,
            'data' => $data,
            'hashed' => $hashed
        ]);

        if ($authenticated == false) {

            return response()->json([
                'status' => false,
                'message' => 'You do not have access to this resource!'

            ], 200);
        }

        $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Book was successfully deleted'
            ], 
        200);

    }
}
