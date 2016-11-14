<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Illuminate\Http\Request;

class AvatarsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Stores the uploaded file.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$path = request()->file('avatar')->store('avatars');

        $file_array = explode('/', $path);

        $file_name = $file_array[1];

        $img = Image::make(request()->file('avatar'))
        	->fit(60, 60)
        	->save('../storage/app/avatars/' . 'tm_' . $file_name);

        Auth::user()->avatar = $path;

        Auth::user()->save();

        return back();
    }
}
