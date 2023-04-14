<?php

namespace App\Http\Controllers;

use App\Models\HobbyChat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // データーベースの件数を取得
        $length = HobbyChat::all()->count();

        // 表示する件数を代入
        $display = 5;
        $hobby_chats = HobbyChat::offset($length-$display)->limit($display)->get();
        return view('hobby_chats.index', compact('hobby_chats'));
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
        $hobby_chat = new HobbyChat;
        $hobby_chat->hobby_id = 1;
        $hobby_chat->user_id = Auth::id();
        $form = $request->all();
        $hobby_chat->fill($form)->save();
        return redirect('hobby_chats');
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
