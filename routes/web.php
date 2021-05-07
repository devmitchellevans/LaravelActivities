<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();
Route::get('/home', function () {
    return redirect('posts');
});



Route::resources([
    '/posts' => PostController::class
]);

Route::resource('posts', PostController::class);

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post');

Route::resource('/comments', App\Http\Controllers\CommentController::class);


