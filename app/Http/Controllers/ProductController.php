<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;


class ProductController extends Controller
{
    public function add(Request $request){
        //$r=request();
        $addProduct=Product::create([
            'name'=>$request->productName,
            'price'=>$request->productPrice,
            'quantity'=>$request->productQuantity,
            'description'=>$request->productDescription,
            'categoryID'=>'1',//$request->CategoryID,
            'image'=>'empty.png',
        ]);
        return view('addProduct');
    }
}
