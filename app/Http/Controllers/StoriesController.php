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

        /**
         * TODO: move these to a database so that they get automatically added on this->store
         */
        $role = [
            'elev',
            'programmerare',
            'austronaut',
            'lärare',
            'planta',
        ];
        $activity = [
            'programmera',
            'koda',
            'dricka cola',
            'spela'

        ];

        $context = [
            'skolan',
            'arbetsplatsen',
            'källaren',
            'zoo',
            'hörnrummet',
            'kontoret',
            'simhallen',
        ];
        $reason = [
            'jag kan',
            'jag vill lära mig',
            'utvecklas',
            'ha kul',
        ];

        return view('story.create', [
                'role' => $this->randomiser($role),
                'activity' => $this->randomiser($activity),
                'context' => $this->randomiser($context),
                'reason' => $this->randomiser($reason),
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