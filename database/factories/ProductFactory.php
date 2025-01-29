<?php
namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'Name' => $this->faker->word,
            'Category' => $this->faker->word,
            'Price' => $this->faker->randomFloat(2, 1, 100),
            'StockQuantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}