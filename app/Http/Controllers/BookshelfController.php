<?php

namespace App\Http\Controllers;

use Auth;
use App\Book;
use App\Bookshelf;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bookshelves = Bookshelf::where('user_id', Auth::user()->id)->get();

        return view('bookshelves.index', compact('bookshelves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookshelves.create');
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

        Bookshelf::create(['title' => $title, 'user_id' => Auth::user()->id]);

        return redirect('/bookshelves');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bookshelf $bookshelf)
    {
        $bookshelf_books = $bookshelf->books;

        $books = Auth::user()->books;

        return view('bookshelves.show', compact(['bookshelf', 'books', 'bookshelf_books']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Bookshelf $bookshelf)
    {
        extract($request->input());

        if (!isset($books)) {

            return redirect()->back();
        }

        foreach ($books as $book) {

            $book_id = Book::where('title', $book)->first()->id;

            $bookshelf->books()->attach($book_id);
        }

        return redirect()->back();
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
