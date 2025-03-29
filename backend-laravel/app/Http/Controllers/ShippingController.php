<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShippingRequest;

class ShippingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ShippingRequest $request)
    {
               $zipCode = $request->validated()['zip'];

               if ($zipCode >= 29000 && $zipCode <= 30999) {
                   return response()->json(0.00);
               }
               if ($zipCode >= 20000 && $zipCode <= 90000) {
                   $shippingPrice = 1 + (($zipCode - 20000) / 100) * 0.15;
                   //price = base cost + ((zip code  - base distance) / 100 to reduce the miles )* cost per mile
                   return response()->json(round($shippingPrice, 2));
               }

    }

}
