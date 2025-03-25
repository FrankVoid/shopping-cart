<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart = new Cart();
        $cart->customer_id = 1;
        $cart->address_id = 1;
        $cart->status = 'active';
        $cart->total_order_price = 0;
        $cart->shipping_cost = 0;
        $cart->save();

        $cart1 = new Cart();
        $cart1->customer_id = 1;
        $cart1->address_id = 2;
        $cart1->status = 'completed';
        $cart1->total_order_price = 100.50;
        $cart1->shipping_cost = 10.00;
        $cart1->save();

        $cart2 = new Cart();
        $cart2->customer_id = 1;
        $cart2->address_id = 3;
        $cart2->status = 'cancelled';
        $cart2->total_order_price = 250.75;
        $cart2->shipping_cost = 15.50;
        $cart2->save();
    }
}
