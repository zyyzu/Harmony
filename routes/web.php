<?php

use App\Http\Controllers\SinglePostAjax;
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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/wall', [\App\Http\Controllers\DashboardController::class, 'index'])->name('user.wall');
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'ownProfile'])->name('user.profile.own');
    Route::post('post/create', [\App\Http\Controllers\PostController::class, 'createPost'])->name("post.create");
    //TODO move ajax to api.php
    Route::post('ajax/liketoggle/{id}', [\App\Http\Controllers\AJAX\SinglePostAjax::class, 'toggleLikeAjax']);
});

Route::get('/', function () {
    if(Auth::check()) return redirect('/wall');
    else return redirect('/login');
});

Auth::routes();


