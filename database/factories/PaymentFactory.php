<?php
namespace Database\Factories;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'OrderID' => Order::factory(),
            'PaymentDate' => $this->faker->dateTime(),
            'PaymentMethod' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            'Amount' => $this->faker->randomFloat(2, 20, 500),
            'Status' => $this->faker->randomElement(['Success', 'Failed', 'Pending']),
        ];
    }
}
