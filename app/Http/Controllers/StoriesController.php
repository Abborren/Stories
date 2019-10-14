<?php

namespace App\Http\Controllers;
use \App\stories;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
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
    public function show(Stories $story)
    {
        dd($story);
    }
}
