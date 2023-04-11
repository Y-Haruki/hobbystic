<?php

namespace App\Http\Controllers;

use App\Models\CategoryChat;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //
        $categories = Category::all();
        $category_chats = CategoryChat::all();
        

        return view('category_chats.index', compact('category_chats', 'category'));
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
    public function store(Request $request, Category $category)
    {
        //
        $categoryChat = new CategoryChat();
        $categoryChat->chat = $request->input('chat');
        $categoryChat->user_id = Auth::id();
        $categoryChat->category_id = $category->id;
        $categoryChat->save();

        return to_route('categories.category_chats.index', $category->id);
        // return redirect()->route('categories.category_chats.index', $category->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryChat  $categoryChat
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryChat $categoryChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryChat  $categoryChat
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryChat $categoryChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryChat  $categoryChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryChat $categoryChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryChat  $categoryChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryChat $categoryChat)
    {
        //
    }
}
