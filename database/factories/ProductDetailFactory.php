<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productId = Product::inRandomOrder()->value('id') ?? Product::factory()->create()->id;

        return [
            'product_id' => $productId,
            'material' => $this->faker->word,
            'made_by' => $this->faker->name,
            'dimensions' => $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2),
        ];
    }
}
