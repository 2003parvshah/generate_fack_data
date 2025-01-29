<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->foreignId('CustomerID')->constrained('customers', 'CustomerID')->onDelete('cascade');
            $table->timestamp('OrderDate')->default(now());
            $table->decimal('TotalAmount', 10, 2);
            $table->string('Status', 50)->check("Status IN ('Pending', 'Shipped', 'Delivered', 'Cancelled')");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('orders');
    }
};
