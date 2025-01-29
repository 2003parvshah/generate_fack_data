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
          Schema::create('payments', function (Blueprint $table) {
            $table->id('PaymentID');
            $table->foreignId('OrderID')->constrained('orders' , 'OrderID')->onDelete('cascade');
            $table->timestamp('PaymentDate')->default(now());
            $table->string('PaymentMethod', 50);
            $table->decimal('Amount', 10, 2);
            $table->string('Status', 50)->check("Status IN ('Success', 'Failed', 'Pending')");
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('payments');
    }
};
