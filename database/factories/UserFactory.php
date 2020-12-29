<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_name' => $this->faker->userName,
            'email' => $this->faker->email,
            'mobile' => '0912' . $this->faker->randomNumber(8),
            'bio' => $this->faker->sentence(),
            'password' => 123456,

        ];
    }
}
