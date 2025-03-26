<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('items', ItemController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('addresses', AddressController::class);
Route::apiResource('cartitems', CartItemController::class);
