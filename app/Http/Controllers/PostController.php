<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;

    public function __construct(BaseRepositoryInterface $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $users = User::with(['followings'])->find(Auth::id());
        $usersId=$users->followings->pluck('id');
        $posts=Post::whereIn('user_id', $usersId)->latest()->get();
        return view('post.index')->with('posts',$posts);
    }

    public function show($id)
    {
        $post = Post::all()->find($id);
        $like = Like::where([['likeable_id', $id], ['likeable_type', 'App\Models\Post'], ['user_id', Auth::id()]])->get();
        return view('post.show')->with(compact('post', 'like'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(CreatePostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->only('caption','comment'));
        $path = $request->file('image')->store('public/post');
        $this->post->createImage($path,$post->id,$model=Post::class);
        return redirect()->route('account.show',auth()->id());

    }

    public function like($id)
    {
        $record = Like::where([['likeable_id', $id], ['user_id', Auth::id()]]);

        //If our record doesn't exist we create it
        if ($record->first() === null) {
            $like = new Like();
            $like->likeable_id = $id;
            $like->likeable_type = Post::class;
            $like->user_id = Auth::id();
            $like->save();
            //If it exists we delete it
        } else {
            $record->delete();
        }

        return redirect()->back();
    }

    public function getRandomPost() {
        $posts = Post::inRandomOrder()->with(['images'])->latest()->paginate(16);
        return view('post.explore')->withPosts($posts);
    }
}
