<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $categories = Category::all();

        return view('categories.create', compact('categories'));
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
        $category = new Category();

        $category->name = $request->input('name');
        // $category->image = $request->input('image');

        $original = request()->file('image')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        request()->file('image')->storeAs('public/images', $name);
        $category->image = $name;

        $category->save();

        return to_route('hobbies.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $hobbies = $category->hobbies;

        return view('categories.show', compact('category', 'hobbies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $categories = Category::all();

        return view('categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // 
        $category->name = $request->input('name') ? $request->input('name') : $user->name;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('images/' . $category->image);
            $original = $request->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->storeAs('public/images',$name);
            $category->image = $name;
        }

        $category->update();

        return to_route('categories.show', $category->id);
    }
}
