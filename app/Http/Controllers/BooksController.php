<?php

namespace App\Http\Controllers;

use Auth;
use App\Genre;
use App\Book;
use App\Author;
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
        $books = Auth::user()->books()->simplePaginate(2);
        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
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

        return redirect('/books');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $book = Book::find($id);

        return view('books.edit', compact('book'));
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

        $book->save();

        return redirect('/books');
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

        return redirect('/books');

    }
}
