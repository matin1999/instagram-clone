<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->faker = Faker\Factory::create();
        for ($i = 1; $i < 1000; $i++) {
            $rnd1 = rand(1,20);
            do {
                $rnd2 = rand(1,20);
            } while ($rnd1 == $rnd2);
            Message::create([
                'body' => $this->faker->sentence,
                'sent_to_id' => $rnd1,
                'sender_id' =>$rnd2,
            ]);

        }
    }
}
