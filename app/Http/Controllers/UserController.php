<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hobby;
use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        // $user = Auth::user();
        
        // $followers_count = count(FollowUser::where('user_id',$user->id)->get());
        // $followings_count = count(FollowUser::where('follower_id',$user->id)->get());
        return view('users.index', compact('users'));
    }

    public function follows(User $user)
    {
        $users = User::all();
        $follows = $user->follows;
        return view('users.follows', compact('users', 'follows'));
    }

    public function followers(User $user)
    {
        $users = User::all();
        $followings = $user->followings;
        return view('users.followers', compact('users', 'followings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $hobbies = $user->hobbies;

        return view('users.show', compact('user', 'hobbies'));
    }

    public function mypage()
    {
        $user = Auth::user();
        // $hobbies = Hobby::all();
        $hobbies = $user->hobbies;

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
            Storage::disk('public')->delete('images/' . $user->image);
            $original = $request->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            // $request->file('image')->move('images',$name);
            request()->file('image')->storeAs('public/images',$name);
            $user->image = $name;

            // 古いファイルを削除する
        }

        if ($request->hasFile('icon')) {
            Storage::disk('public')->delete('images/' . $user->icon);
            $originalicon = $request->file('icon')->getClientOriginalName();
            $nameicon = date('Ymd_His').'_'.$originalicon;
            // $request->file('icon')->move('images',$nameicon);
            request()->file('icon')->storeAs('public/images',$nameicon);
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

    // 退会機能（要確認）

    public function destroy(Request $request)
    {
        $user = Auth::user();

        // if ($user->deleted_flag) {
        //     $user->deleted_flag = false;
        // } else {
        //     $user->deleted_flag = true;
        // }
        $user->delete();

        Auth::logout();
        return redirect('/');
    }
    
    public function favorite()
    {
        $user = Auth::user();

        $favorites = $user->favorites(Hobby::class)->get();

        return view('users.favorite', compact('favorites'));
    }

    public function follow(User $user)
    {
        auth()->user()->follow($user);

        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);

        return back();
    }
    
}
