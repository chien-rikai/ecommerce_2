<?php

namespace Database\Factories;

use App\Models\Product;
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
        return [
            'name' => 'iphone',
            'decribe' => 'nice',
            'url_img' => 'iphone.png',
            'price' => '1000000',
            'discount' => 10,
            'category_id' => 1,
        ];
    }
}
