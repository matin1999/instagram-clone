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
    //message
    Route::get('direct/{user}','MessageController@show')->name('direct.show');
    Route::get('direct','MessageController@index')->name('direct.index');
    Route::post('send/message/{user}','MessageController@sendMessage')->name('send.message');
    //story
    Route::get('/stories/{user}', 'StoryController@index')->name('story.index');
    Route::get('/story/{story}', 'StoryController@show')->name('story.show');
    Route::get('/story/{user}/create', 'StoryController@create')->name('story.create');
    Route::post('/story/store', 'StoryController@store')->name('story.store');
    //posts
    Route::get('/post/{post}', 'PostController@show')->name('post.show');
    Route::get('/post/{user}/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    //comment
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
    // explore
    Route::get('/explore', 'PostController@getRandomPost')->name('explore');

    //Home PAge
    Route::get('/Home/', 'PostController@index')->name('home');

    //follow method
    Route::post('/profile/{user}/follow', 'FollowController@follow')->name('account.follow');
    //like
    Route::post('/{post}/like', 'PostController@like')->name('post.like');
    //setting
    Route::get('/account/settings', 'UserController@settings')->name('account');
    Route::patch('/account/settings', 'UserController@update')->name('account.update');
    //auth user account
    Route::get('/account', function () {
        return redirect()->route('account.show', ['user' => auth()->id()]);
    })->name('user.account');
});
