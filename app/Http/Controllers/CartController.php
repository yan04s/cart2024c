<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\myCart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCart(Request $request)
    {
        //$r=request();
        $add=myCart::create([
            'productID'=>$request->id,
            'quantity'=>$request->quantity,
            'userID'=>Auth::id(),
            'orderID'=>''
        ]);
        return redirect()->back();
    }
    
}
