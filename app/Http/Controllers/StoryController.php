<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryCreateRequest;
use App\Models\Mention;
use App\Models\Story;
use App\Models\Tag;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    protected $story;

    public function __construct(BaseRepositoryInterface $story)
    {
        $this->story = $story;
    }

    public function index($id)
    {
        $stories = Story::with('images','creator','mentions')->where('user_id',$id)->get();
        return view('story.show')->withStories($stories);
    }
    public function show($id)
    {
        $stories = Story::with('images','creator','mentions')->withTrashed()->find($id)->get();
        return view('story.show')->withStories($stories);
    }
    public function create($id)
    {
        return view('story.create');
    }

    public function store(StoryCreateRequest $request)
    {
        $story = auth()->user()->stories()->create();
        $path = $request->file('image')->store('public/story');
        $this->story->createImage($path,$story->id,$model=Story::class);
        return redirect()->route('account.show',auth()->id());
    }
}
