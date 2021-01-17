<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Mention;
use App\Models\Story;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Story::factory(100)->create()->each(function ($story){
            Mention::factory(rand(1,2))->create(['mentionable_type' => "App\Models\Story", 'mentionable_id'=>$story->id]);
            Image::factory(1)->create(['imageable_type' => "App\Models\Story", 'imageable_id'=>$story->id]);
        });
    }
}
