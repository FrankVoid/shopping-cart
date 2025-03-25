<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cartItem = new CartItem();
        $cartItem->cart_id = 1;
        $cartItem->item_id = 6;
        $cartItem->quantity = 2;
        $cartItem->price_at_purchase = 0.0;
        $cartItem->save();

        $cartItem = new CartItem();
        $cartItem->cart_id = 1;
        $cartItem->item_id = 3;
        $cartItem->quantity = 2;
        $cartItem->price_at_purchase = 0.0;
        $cartItem->save();

        $cartItem = new CartItem();
        $cartItem->cart_id = 2;
        $cartItem->item_id = 1;
        $cartItem->quantity = 2;
        $cartItem->price_at_purchase = 0.0;
        $cartItem->save();

        $cartItem = new CartItem();
        $cartItem->cart_id = 2;
        $cartItem->item_id = 5;
        $cartItem->quantity = 2;
        $cartItem->price_at_purchase = 0.0;
        $cartItem->save();

        $cartItem = new CartItem();
        $cartItem->cart_id = 3;
        $cartItem->item_id = 2;
        $cartItem->quantity = 2;
        $cartItem->price_at_purchase = 0.0;
        $cartItem->save();

        $cartItem = new CartItem();
        $cartItem->cart_id = 3;
        $cartItem->item_id = 4;
        $cartItem->quantity = 2;
        $cartItem->price_at_purchase = 0.0;
        $cartItem->save();

    }
}
