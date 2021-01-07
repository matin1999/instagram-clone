<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Like;
use App\Models\Mention;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(20)->create();
        Post::factory(200)->create()->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(3, 4)));
            Image::factory(2)->create(['imageable_type' => "App\Models\Post", 'imageable_id'=>$post->id]);
            Mention::factory(3)->create(['mentionable_type' => "App\Models\Post", 'mentionable_id'=>$post->id]);
        });
    }
}
