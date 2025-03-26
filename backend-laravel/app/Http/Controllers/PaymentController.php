<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PaymentRequest $request)
    {
        $request->validated();
        $card = $request->card;
        $cardHolder = strtoupper($request->card_holder);
        $date = $request->expiration;

        $month = substr($date, 0, 2);
        $year = substr($date, 2, 2);

        $currentMonth = date('m');
        $currentYear = date('y');

        if ($month < 1 || $month > 12) {
            return response()->json('Invalid expiration month', 400);
        }elseif ($year < $currentYear || $year == $currentYear && $month <= $currentMonth) {
            return response()->json('Card Expired', 400); ;
        }
        if ($year >= $currentYear && $month > $currentMonth) {
            if($card == 4111111111111111 && $cardHolder == 'TEST'){

                return response()->json('payment successful', 200);
            }else{
                return response()->json('payment Decline', 400);
            }
        }
    }

}
