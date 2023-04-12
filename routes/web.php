<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryChatController;
use App\Http\Controllers\HobbyChatController;

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

Route::get('/', function () {
    return view('welcome');
});


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

Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
    Route::patch('users/mypage', 'update')->name('mypage.update');

    Route::put('users/mypage', 'update_password')->name('mypage.update_password');
});

Route::resource('hobbies', HobbyController::class)->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);

Route::resource('categories', CategoryController::class);

// Route::resource('category_chats', CategoryChatController::class);

Route::controller(CategoryChatController::class)->group(function () {
    Route::get('/categories/{category}/category_chats', 'index')->name('categories.category_chats.index');

    Route::post('/categories/{category}/category_chats', 'store')->name('categories.category_chats.store');
});

// 4/11やること：Route::put('/categories/{category}/category_chats', store)～で投稿できるようにする


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 1:35
