<?php

namespace App\Http\Controllers;

use App\Models\HobbyChat;
use App\Models\User;
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
        $hobby_chats = HobbyChat::all();
        return view('hobby_chats.index', compact('hobby_chats'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $chat = $request->input('chat');
        HobbyChat::create([
            'user_id' => $user->id,
            // 'name' => $user->name,
            'chat' => $chat,
            'hobby_id' => 1//後で変更する
        ]);
        return redirect()->route('hobby_chats.index');
    }

    public function getData()
    {
        // $hobby_chats = HobbyChat::orderBy('created_at', 'desc')->get();
        $hobby_chats = HobbyChat::with('user')->orderBy('created_at', 'desc')->get();
        // var_dump($hobby_chats);
        // dd($hobby_chats);
        $json = ["hobby_chats" => $hobby_chats];
        return response()->json($json);
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
        // $hobby_chat = new HobbyChat;
        // $hobby_chat->hobby_id = 1;
        // $hobby_chat->user_id = Auth::id();
        // $form = $request->all();
        // $hobby_chat->fill($form)->save();
        // return redirect('hobby_chats');
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
