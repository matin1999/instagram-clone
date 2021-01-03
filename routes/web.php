<?php

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//users profile
Route::get('/profile/{user}', 'UserController@show')->name('account.show');
Route::get('/{user}/followings', 'UserController@following')->name('following.show');
Route::get('/{user}/followers', 'UserController@followers')->name('followers.show');
//auth profile
Route::middleware(['auth'])->group(function () {
    //Users
    //follow method
    Route::post('/profile/{user}/follow', 'FollowController@follow')->name('account.follow');
    //setting
    Route::get('/account/settings', 'UserController@settings')->name('account');
    Route::patch('/account/settings', 'UserController@update')->name('account.update');
    //auth user account
    Route::get('/account', function () {
        return redirect()->route('account.show', ['user' => auth()->id()]);
    })->name('user.account');
});
