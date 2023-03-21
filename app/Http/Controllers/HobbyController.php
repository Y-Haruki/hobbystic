<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Category_Hobby;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hobbies = Hobby::all();

        return view('hobbies.index', compact('hobbies'));
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

        return view('hobbies.create', compact('categories'));
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
        $hobby = new Hobby();
        $hobby->name = $request->input('name');
        $hobby->title = $request->input('title');
        $hobby->image = $request->input('image');
        $hobby->content = $request->input('content');
        $hobby->category_id = $request->input('category_id');
        $hobby->save();

        // category_hobbyのテーブルにも追記される
        $hobby->categories()->attach($request->input('category_id'));

        return to_route('hobbies.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {
        //
        return view('hobbies.show', compact('hobby'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {
        //
        $categories = Category::all();

        return view('hobbies.edit', compact('hobby', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hobby $hobby)
    {
        //
        $hobby->name = $request->input('name');
        $hobby->title = $request->input('title');
        $hobby->image = $request->input('image');
        $hobby->content = $request->input('content');
        $hobby->category_id = $request->input('category_id');
        $hobby->update();

        // category_hobbyのテーブルにも更新される
        $hobby->categories()->sync($request->input('category_id'));

        return to_route('hobbies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        //
        $hobby->delete();
        // category_hobbyのテーブルにも更新される
        $hobby->categories()->detach($hobby->category_id);

        return to_route('hobbies.index');
    }
}
