<?php

namespace App\Http\Controllers;

use App\ApiConsumer;
use Illuminate\Http\Request;

class ApiRegistrationController extends Controller
{
    /**
     * Display a form for the user to register for an api key.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('api.register');
    }

    /**
     * Register a client for an api key and shared secret.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        extract($request->input());

        $api_key = md5(uniqid(rand(), true));

        $secret = md5(uniqid(rand(), true));

        $consumer = new ApiConsumer();

        $consumer->consumer_name = $consumer_name;
        	
        $consumer->api_key = $api_key;

        $consumer->secret = $secret;

        $consumer_saved = $consumer->save();

        if (!$consumer_saved) {
        	die('Something went wrong');
        }

        return view('api.welcome', compact('consumer'));
        
    }
}
