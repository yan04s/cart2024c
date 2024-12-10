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
        //return view('addProduct');
        return redirect()->route('showProduct');
    }

    public function show(){
        $viewProduct=Product::all();// SQL: SELECT * FROM PRODUCTS 
        return view('showProduct')->with('products',$viewProduct); //products = $viewProduct
    }

    public function edit($id){
        $editProduct=Product::all()->where('id',$id);// SQL: SELECT * FROM PRODUCTS WHERE ID='$id'
        return view('editProduct')->with('products',$editProduct);
    }

    public function update(Request $request){
        //$r=request();
        $updateProduct=Product::find($request->id);
        $updateProduct->name=$request->productName;
        $updateProduct->price=$request->productPrice;
        $updateProduct->quantity=$request->productQuantity;
        $updateProduct->description=$request->productDescription;
        if($request->hasFile('productImage')){//$r->file('productImage')!=''
            $image=$request->file('productImage');
            $image->move('images',$image->getClientOriginalName());
            $updateProduct->image=$image->getClientOriginalName();//'images/'.
        }
        $updateProduct->save();// UPDATE PRODUCTS SET NAME='$productName', PRICE='$productPrice', QUANTITY='$productQuantity', DESCRIPTION='$productDescription' WHERE ID='$id'
        return redirect()->route('showProduct');
    }

    public function delete($id){
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();// DELETE FROM PRODUCTS WHERE ID='$id'
        return redirect()->route('showProduct');
    }
}
