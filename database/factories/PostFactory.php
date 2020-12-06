<?php

// Info this was created by using 'php artisan make:factory PostFactory --model=Post' in the terminal

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(7,11),
            'post_image' => $this->faker->imageUrl('900','300'),
            'body' => $this->faker->paragraphs(rand(10,15), true),
        ];
    }
}
