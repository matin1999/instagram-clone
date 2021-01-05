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
        Image::factory()->create(['imageable_type' => "App\Models\User", 'imageable_id'=>$user->id]);

        $user=User::factory()->count(20)->create()->each(function ($user){
            Image::factory()->create(['imageable_type' => "App\Models\User", 'imageable_id'=>$user->id]);
            $rnd1 = rand(1,20);
            do {
                $rnd2 = rand(1,20);
            } while ($rnd1 == $rnd2);
            $user->followings()->attach([$rnd1,$rnd2]);
        });
    }
}
