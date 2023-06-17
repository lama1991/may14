<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
})->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => 'auth',
    ],function (){
    Route::resource('/posts',PostController::class);
    Route::get('/user-posts',[PostController::class,'userPosts'])->middleware('auth');
    Route::get('posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
    Route::get('posts/restore-all', [PostController::class, 'restoreAll'])->name('posts.restoreAll');
    Route::post('create_comment/{pid}', [CommentController::class, 'store'])->name('create_comment');
}

);
Route::get('admin',[AdminController::class,'getPosts'])->middleware('admin');
