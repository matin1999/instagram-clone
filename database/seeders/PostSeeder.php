<?php

namespace Database\Seeders;

use App\Models\Image;
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
        $tags = Tag::factory(5)->create();
        Post::factory(200)->create()->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(3, 4)));
            Image::factory()->create(['imageable_type' => "App\Models\Post", 'imageable_id'=>$post->id]);
        });
    }
}
