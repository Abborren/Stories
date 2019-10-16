<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoriesRequest;
use \App\Stories;
use \App\Role;
use \App\Reason;
use \App\Context;
use \App\Activity;
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

        /**
         * TODO: move these to a database so that they get automatically added on this->store
         */
        return view('story.create', [
                'role' => Role::all()->random()->text,
                'activity' => Activity::all()->random()->text,
                'context' => Context::all()->random()->text,
                'reason' => Reason::all()->random()->text,
            ]);
    }

    public function randomiser($data)
    {
        return $data[rand(0,count($data)-1)]; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoriesRequest $request)
    {
        // dd($request->all());
        $story = new Stories($request->all());
        $story->save();
        $id = Hashids::encode($story->id);
        return view('story.link', ['url' => url("/story/{$id}")]);
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
        
        $story = Stories::findOrFail($number)->first();
        if($story == null) {
            return redirect('/error');
        }
        return view('story.show', ['text' => $story->body]);; 
    }

}