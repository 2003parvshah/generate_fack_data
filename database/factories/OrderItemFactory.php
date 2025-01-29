<?php
namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            // 'ProductID' => Product::inRandomOrder()->first()->ProductID, 
            'OrderID' => Order::factory(),
            'ProductID' => Product::factory(),
            'Quantity' => $this->faker->numberBetween(1, 10),
            'Price' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
