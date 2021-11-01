<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public const RANDOM_IMAGE_URL = 'https://picsum.photos/800/800';

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
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(100),
            'content' => $this->faker->realText(2500)
        ];
    }

    public function configure(): PostFactory
    {
        return $this->afterCreating(function (Post $post) {
            $post->addMediaFromUrl(self::RANDOM_IMAGE_URL)
                ->preservingOriginal()
                ->toMediaCollection('default', 'posts');
        });
    }
}
