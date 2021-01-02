<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with(['posts','stories','image', 'followers','followings'])->find($id);
        $posts=Post::with('images')->where('user_id',$id)->get();
        return view('profile.show')->withUser($user)->withPosts($posts);
    }

    public function following($id)
    {
        $users = User::with(['followings'])->find($id);
        $follow=$users->followings;
        return view('profile.list')->withFollow($follow);
    }

    public function followers($id)
    {
        $users = User::with(['followers'])->find($id);
        $follow=$users->followers;
        return view('profile.list')->withFollow($follow);
    }

}
