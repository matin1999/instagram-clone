<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['name' => 'matin','user_name'=>'matin', 'email' => 'matin@gmail.com', 'mobile' => '09011641095', 'password'=> '123456']);
        $user=User::factory()->count(20)->create()->each(function ($user){
            Image::factory()->create(['imageable_type' => "App\Models\User", 'imageable_id'=>$user->id]);
        });;
    }
}
