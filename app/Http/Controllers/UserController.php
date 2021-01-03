<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use App\Repositories\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function show($id)
    {
        $user = User::with(['posts', 'stories', 'image', 'followers', 'followings'])->find($id);
        $posts = Post::with('images')->where('user_id', $id)->get();
        return view('profile.show')->withUser($user)->withPosts($posts);
    }

    public function following($id)
    {
        $users = User::with(['followings'])->find($id);
        $follow = $users->followings;
        return view('profile.list')->withFollow($follow);
    }

    public function followers($id)
    {
        $users = User::with(['followers'])->find($id);
        $follow = $users->followers;
        return view('profile.list')->withFollow($follow);
    }

    public function settings()
    {
        $user = User::with(['image'])->find(auth()->id());
        return view('profile.setting')->with('user', $user);
    }

    public function update(UserUpdateRequest $request)
    {
        $user = User::find(auth()->id());

        //Update image if new one provided
        if ($request->image !== null) {
            $user->image ? $user->image->delete() : $user->image;
            $path = $request->file('image')->store('public/image');
            $this->user->createImage($path,$id=auth()->id(),$model=User::class);
        }
        //Update rest if set.
        strlen($request->user_name) > 0 ? $user->user_name = $request->user_name : '';
        strlen($request->bio) > 0 ? $user->bio = $request->bio : '';
        strlen($request->new_password) > 0 ? $user->password = Hash::make($request->new_password) : '';


        $user->save();

        return redirect()->route('user.account');
    }

}
