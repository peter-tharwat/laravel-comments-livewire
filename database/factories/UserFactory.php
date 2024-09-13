<?php

namespace Spatie\LivewireComments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\LivewireComments\Tests\Support\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'password' => bcrypt($this->faker->sentence),
        ];
    }
}
