<?php

namespace App\Http\Controllers;

use App\Models\myOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
	       
	    // Stripe::setApiKey(env('STRIPE_SECRET'));
        // Charge::create ([
        //     "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
        //     "currency" => "MYR",
        //     "source" => $request->stripeToken,
        //     "description" => "This payment is testing purpose of southern online",
        // ]);

        $newOrder=myOrder::Create([
            'paymentStatus'=>"Done", 
            'userID'=>Auth::id(),
            'amount'=>$request->sub
        ]);
        $orderID=DB::table('my_orders')->where('userID',Auth::id())->orderBy('created_at','desc')->first();//->id //get last record from the user
           
        return back();
    }
}
