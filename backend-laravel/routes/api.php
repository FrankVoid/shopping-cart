<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PaymentController;

Route::apiResource('items', ItemController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('addresses', AddressController::class);
Route::apiResource('cartitems', CartItemController::class);

//Simulate Shipping API
Route::post('/shipping',ShippingController::class);
//Simulate Shipping API
Route::post('/payment', PaymentController::class);
