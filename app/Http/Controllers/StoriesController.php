<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoriesRequest;
use \App\Stories;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
class StoriesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoriesRequest $request)
    {
        // dd(Hashids::encode($id->));
        dd($request);
        // Validate the request
        // Save request
        // Reutrn a view with the url of the redirect page.
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($id_encrypted)
    { 
        $number = Hashids::decode($id_encrypted);
        
        $story = Stories::findOrFail($number)[0];
        return $story->body; 
    }

    public function index($id)
    {
               
    }
}