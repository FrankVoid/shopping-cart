<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::all();
        return response()->json($cart,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $cart = Cart::created($request->validated());
        return response()->json($cart,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return response()->json($cart,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->validated());
        return response()->json($cart,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json('Cart Deleted',200);
    }
}
