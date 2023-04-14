<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Category_Hobby;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        $hobby->user_id = Auth::id();
        $hobby->name = $request->input('name');
        $hobby->title = $request->input('title');
        // $hobby->image = $request->input('image');
        // $hobby->image = $request->file('image')->store('public/image');
        $original = request()->file('image')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        // request()->file('image')->move('storage/images',$name);
        request()->file('image')->storeAs('public/images',$name);
        
        // $hobby->image = 'storage/images/' . $name;
        $hobby->image =  $name;
        
        $hobby->content = $request->input('content');
        // 3/30削除
        // $hobby->category_id = $request->input('category_id');
        $hobby->save();

        // category_hobbyのテーブルにも追記される
        // 4/3変更↓こっちの方がcategory-hobbyに反映される
        $hobby->categories()->attach($request->input('category_id'));
        // $categories = $request->input('category_id');
        // foreach ($categories as $category) {
        //     $hobby->categories()->attach($category);
        // }

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
        $categories = $hobby->categories;

        return view('hobbies.show', compact('hobby', 'categories'));
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
        // $hobby->image = $request->input('image');

        Storage::disk('public')->delete('images/' . $hobby->image);
        $original = request()->file('image')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        // request()->file('image')->move('storage/images',$name);
        // $hobby->image = $name;
        
        // request()->file('image')->storeAs('public/images',$name);
        request()->file('image')->storeAs('public/images',$name);
        
        $hobby->image =  $name;

        $hobby->content = $request->input('content');
        // 3/30削除
        // $hobby->category_id = $request->input('category_id');
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

    public function favorite(Hobby $hobby)
    {
        Auth::user()->togglefavorite($hobby);

        return back();
    }
}
