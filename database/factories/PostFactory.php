<?php

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
        $userId = User::inRandomOrder()->value('id') ?? User::factory()->create()->id;

        return [
            'image' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->sentence,
            'desc' => $this->faker->sentence,
            'text' => $this->faker->paragraph,
            // 'user_id' => $userId,
        ];
    }
}
