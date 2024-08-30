<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryId = Category::inRandomOrder()->value('id') ?? Category::factory()->create()->id;

        return [
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->word,
            'desc' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'text' => $this->faker->paragraph,
            'ip_address' => $this->faker->ipv4,
            'category_id' => $categoryId,
        ];
    }
}
