<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryChatController;
use App\Http\Controllers\HobbyChatController;
use App\Http\Controllers\TopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// 投稿機能全体
// 投稿の一覧ページ
// Route::get('/hobbies', [PostController::class, 'index'])->name('hobbies.index');

// // 投稿の作成ページ
// Route::get('/hobbies/create', [PostController::class, 'create'])->name('hobbies.create');

// // 投稿の作成機能
// Route::post('/hobbies', [PostController::class, 'store'])->name('hobbies.store');

// // 投稿の詳細ページ
// Route::get('/hobbies/{post}', [PostController::class, 'show'])->name('hobbies.show');

// // 投稿の更新ページ
// Route::get('/hobbies/{post}/edit', [PostController::class, 'edit'])->name('hobbies.edit');

// // 投稿の更新機能
// Route::patch('/hobbies/{post}', [PostController::class, 'update'])->name('hobbies.update');

// // 投稿の削除機能
// Route::delete('/hobbies/{post}', [PostController::class, 'destroy'])->name('hobbies.destroy');
// // 

// ホーム画面
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('top.top');
// });
Route::get('/', [TopController::class, 'top'])->name('top.top');


Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
    Route::patch('users/mypage', 'update')->name('mypage.update');

    Route::get('users', 'index')->name('users.index');
    Route::get('users/{user}', 'show')->name('users.show');

    Route::get('users/{user}/follows', 'follows')->name('users.follows');
    Route::get('users/{user}/followers', 'followers')->name('users.followers');

    Route::put('users/mypage', 'update_password')->name('mypage.update_password');

    
    Route::delete('users/mypage', 'destroy')->name('mypage.destroy');
    Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
});

Route::middleware('auth')->group(function () {
    Route::post('users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
    Route::delete('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
});


Route::resource('hobbies', HobbyController::class)->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);
Route::get('hobbies/{hobby}/favorite', [HobbyController::class, 'favorite'])->name('hobbies.favorite');

Route::resource('categories', CategoryController::class);

// Route::resource('category_chats', CategoryChatController::class);

Route::controller(CategoryChatController::class)->group(function () {
    Route::get('/categories/{category}/category_chats', 'index')->name('categories.category_chats.index');

    Route::post('/categories/{category}/category_chats', 'store')->name('categories.category_chats.store');
});

// 4/11やること：Route::put('/categories/{category}/category_chats', store)～で投稿できるようにする


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('hobby_chats', HobbyChatController::class);
// Route::post('/add', 'HobbyChatController@add')->name('add');
Route::post('hobbies/{hobby}/add', [HobbyChatController::class, 'add'])->name('add');
Route::get('hobbies/result/ajax/{id}', [HobbyChatController::class, 'getData']);

