<?php

namespace App\Http\Controllers;

use App\Ariticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "/articles => ArticleController@index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ariticle  $ariticle
     * @return \Illuminate\Http\Response
     */
    public function show(Ariticle $ariticle)
    {
        //
        var_dump($ariticle->title);
        return "/articles/". $ariticle. " => ArticleController@show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ariticle  $ariticle
     * @return \Illuminate\Http\Response
     */
    public function edit(Ariticle $ariticle)
    {
        //
        return "/articles/". $ariticle.  "/edit/ => ArticleController@edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ariticle  $ariticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ariticle $ariticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ariticle  $ariticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ariticle $ariticle)
    {
        //
    }
}
