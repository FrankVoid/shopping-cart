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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->default(1);
            $table->foreignId('address_id')->constrained('addresses')->default(1);
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->decimal('total_order_price', 10, 2)->nullable()->default(0,0);
            $table->decimal('shipping_cost', 10,2)->nullable()->default(0,0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
