<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top(Hobby $hobby, Category $category)
    {
        //
        // $hobbies = Hobby::all();
        $categories = Category::all();
        // $users = User::all();

        // favoritesテーブルからfavoritable_idごとに集計し、出現回数をカウントする
        $favoritesCount = DB::table('favorites')
        ->select('favoriteable_id', DB::raw('count(*) as count'))
        ->groupBy('favoriteable_id')
        ->get();

        // 出現回数が多い順にソートし、上位3つのfavoritable_idを取得する
        $topFavorites = $favoritesCount->sortByDesc('count')->take(3)->pluck('favoriteable_id');

        // 投稿データを取得する
        $hobbies = Hobby::whereIn('id', $topFavorites)->get();

        // カテゴリからランダムに3件取得
        $categoryRandoms = DB::table('categories')->inRandomOrder()->limit(3)->get();

        // follower_userテーブルからuser_idごとに集計し、出現回数をカウントする
        $followerCount = DB::table('follower_user')
        ->select('user_id', DB::raw('count(*) as count'))
        ->groupBy('user_id')
        ->get();

        // // 出現回数が多い順にソートし、上位3つのuser_idを取得する
        // $topFollowers = $followerCount->sortByDesc('count')->take(3)->pluck('user_id');

        // // 投稿データを取得する
        // $users = User::whereIn('id', $topFollowers)->get();
        // 出現回数が多い順にソートし、上位3つのuser_idを取得する
        $topFollowers = $followerCount->sortByDesc('count')->take(3)->pluck('user_id')->toArray();

        // 投稿データを取得する
        $users = User::whereIn('id', $topFollowers)->get()->sortBy(function($user) use ($topFollowers) {
            return array_search($user->id, $topFollowers);
        });

        return view('top.top', compact('hobbies', 'categories', 'users', 'hobby', 'category', 'categoryRandoms'));
    }
}
