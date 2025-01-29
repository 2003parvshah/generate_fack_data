<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'CustomerID' => Customer::factory(),
            'OrderDate' => $this->faker->dateTime(),
            'TotalAmount' => $this->faker->randomFloat(2, 20, 500),
            'Status' => $this->faker->randomElement(['Pending', 'Shipped', 'Delivered', 'Cancelled']),
        ];
    }
}
