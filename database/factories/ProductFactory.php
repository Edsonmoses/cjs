<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10,500),
            'image' => 'cjs_'.$this->faker->unique()->numberBetween(1,22).'.jpg',
            'thurmbnail' => 'cjs_'.$this->faker->unique()->numberBetween(1,22).'.jpg',
            'subcategory_id' => $this->faker->numberBetween(1,5),
            'addItem' => $this->faker->text(255),
            //'addPrice' => $this->faker->numberBetween(10,500),
        ];
    }
}
