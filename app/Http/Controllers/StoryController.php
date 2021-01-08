<?php

namespace App\Http\Controllers;

use App\Models\Mention;
use App\Models\Story;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function show($id)
    {
        $stories = Story::with('images','creator','mentions')->where('user_id',$id)->get();
        return view('story.show')->withStories($stories);
    }
}
