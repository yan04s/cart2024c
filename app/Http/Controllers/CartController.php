<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //return redirect()->back();
        return redirect()->route('myCart');
    }

    public function view()
    {
        $carts=DB::table('my_carts')
        ->leftjoin('products', 'my_carts.productID', '=', 'products.id')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','products.*')//specify which data column of products you want, instead of select all to optimize performance 
        ->where('my_carts.userID','=',Auth::id())
        ->where('my_carts.orderID', '=', '')
        ->get();
        return view('myCart')->with('carts',$carts);
    }
    
}
