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
    Route::post('post/create', [\App\Http\Controllers\Posts\CreatePost::class, 'createPost'])->name("post.create");
    //TODO move ajax to api.php
    Route::post('ajax/liketoggle/{id}', [\App\Http\Controllers\AJAX\SinglePostAjax::class, 'toggleLikeAjax']);
});
Route::group(['middleware'=>['auth']], function(){
    Route::get('/profile', [\App\Http\Controllers\Profile\UserOwnProfile::class, 'ownProfile'])->name('user.profile.own');
    Route::get('/edit/profile', [\App\Http\Controllers\Profile\UserEditProfileForm::class, 'showEditForm'])->name('user.editprofile.form');
    Route::post('/edit/profile/update', [\App\Http\Controllers\Profile\UserEditProfile::class, 'editProfile'])->name('user.editprofile.update');
});
Route::get('/', function () {
    if(Auth::check()) return redirect('/wall');
    else return redirect('/login');
});

Auth::routes();


