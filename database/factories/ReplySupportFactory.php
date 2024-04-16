<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplySupportFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            //'support_id' => Support::factory(),
            'description' => $this->faker->sentence()
        ];
    }
}
