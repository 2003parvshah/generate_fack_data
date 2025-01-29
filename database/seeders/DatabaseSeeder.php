<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Customers
        Customer::factory(10)->create();

        // Create Products
        Product::factory(20)->create();

        
        Order::factory(10)->create();
        // Create Orders with related data
        Order::factory(15)
            ->has(OrderItem::factory()->count(2), 'items')
            ->has(Payment::factory()->count(1), 'payments')
            ->create();
    }
}