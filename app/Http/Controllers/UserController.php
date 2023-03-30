<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hobby;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $hobbies = Hobby::all();

        return view('users.mypage', compact('user', 'hobbies'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        // $user->image = $request->input('image') ? $request->input('image') : $user->image;
        
        // editのformにenctype="multipart/form-data"を付けるのを忘れずに
        if ($request->hasFile('image')) {
            $original = $request->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            $request->file('image')->move('images',$name);
            $user->image = $name;
        }

        if ($request->hasFile('icon')) {
            $originalicon = $request->file('icon')->getClientOriginalName();
            $nameicon = date('Ymd_His').'_'.$originalicon;
            $request->file('icon')->move('images',$nameicon);
            $user->icon = $nameicon;
        }
        
        // $user->icon = $request->input('icon') ? $request->input('icon') : $user->icon;
        $user->update();

        return to_route('mypage');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();

        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return to_route('mypage.edit');
        }

        return to_route('mypage');
    }
}
