<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItem = CartItem::all();
        return response()->json($cartItem,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartItemRequest $request)
    {
        $cartItem = CartItem::create($request->validated());
        return response()->json($cartItem,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        return response()->json($cartItem,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $cartItem->update($request->validated());
        return response()->json($cartItem,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return response()->json('CartItem Deleted',200);
    }
}
