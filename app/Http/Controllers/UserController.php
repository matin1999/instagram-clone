<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = user::with(['posts','stories','image', 'followers','followings'])->find($id);
        $posts=Post::with('images')->where('user_id',$id)->get();

        return view('profile.show')->withUser($user)->withPosts($posts);
    }

}
