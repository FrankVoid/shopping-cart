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

Route::get('items', [ItemController::class, 'index']);
Route::post('items', [ItemController::class, 'store']);
Route::get('items/{item}', [ItemController::class, 'show']);
Route::put('items/{item}', [ItemController::class, 'update']);
Route::delete('items/{item}', [ItemController::class, 'destroy']);

Route::get('customers', [CustomerController::class, 'index']);
Route::post('customers', [CustomerController::class, 'store']);
Route::get('customers/{customer}', [CustomerController::class, 'show']);
Route::put('customers/{customer}', [CustomerController::class, 'update']);
Route::delete('customers/{customer}', [CustomerController::class, 'destroy']);

Route::get('carts', [CartController::class, 'index']);
Route::post('carts', [CartController::class, 'store']);
Route::get('carts/{cart}', [CartController::class, 'show']);
Route::put('carts/{cart}', [CartController::class, 'update']);
Route::delete('carts/{cart}', [CartController::class, 'destroy']);

Route::get('addresses', [AddressController::class, 'index']);
Route::post('addresses', [AddressController::class, 'store']);
Route::get('addresses/{address}', [AddressController::class, 'show']);
Route::put('addresses/{address}', [AddressController::class, 'update']);
Route::delete('addresses/{address}', [AddressController::class, 'destroy']);

Route::get('cartitems', [CartItemController::class, 'index']);
Route::post('cartitems', [CartItemController::class, 'store']);
Route::get('cartitems/{cartItem}', [CartItemController::class, 'show']);
Route::put('cartitems/{cartItem}', [CartItemController::class, 'update']);
Route::delete('cartitems/{cartItem}', [CartItemController::class, 'destroy']);


//Simulate Shipping API
Route::post('/shipping',ShippingController::class);
//Simulate Shipping API
Route::post('/payment', PaymentController::class);

//Simulate Shipping API
Route::post('/shipping',ShippingController::class);
//Simulate Shipping API
Route::post('/payment', PaymentController::class);
