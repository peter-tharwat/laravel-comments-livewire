<?php

namespace Spatie\LivewireComments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\LivewireComments\Tests\Support\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
