<?php

namespace App\Http\Controllers;

use App\Models\HobbyChat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HobbyChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('hobby_chats/index');
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
     * @param  \App\Models\HobbyChat  $hobbyChat
     * @return \Illuminate\Http\Response
     */
    public function show(HobbyChat $hobbyChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HobbyChat  $hobbyChat
     * @return \Illuminate\Http\Response
     */
    public function edit(HobbyChat $hobbyChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HobbyChat  $hobbyChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HobbyChat $hobbyChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HobbyChat  $hobbyChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(HobbyChat $hobbyChat)
    {
        //
    }
}
