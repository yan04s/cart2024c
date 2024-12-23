<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
	       
	    Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
            "currency" => "MYR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of southern online",
        ]);
           
        return back();
    }
}
