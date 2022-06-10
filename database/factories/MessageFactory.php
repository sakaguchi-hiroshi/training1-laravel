<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Message;
use App\Models\User;
// use Faker\Generater as Faker;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition () {
        return [
            'user_id' => User::factory(),
            'text' => $this->faker->text,
        ];
    }
}
