<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Favorit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct(Request $request){
        try{
            if($cart = Cart::where(['user_id' => $request->user_id, 'status' => 0, 'is_open' => 0])->exists()){
                $cart = Cart::where(['user_id' => $request->user_id, 'status' => 0, 'is_open' => 0])->first();
                if($cartDetails = CartDetails::where(['cart_id' => $cart->id, 'product_id' => $request->product_id,
                    'is_open' => 0])->exists()){
                    return redirect()->back()->with('error', 'Product Exists !');
                }else{
                    CartDetails::create([
                       'cart_id' => $cart->id,
                       'product_id' => $request->product_id,
                       'quantity' => 0,
                       'total_price' => 0
                    ]);
                    return redirect()->back()->with('success', 'updated and product added');
                }
            }else{
                $cartCreate = Cart::create([
                   'user_id' => $request->user_id
                ]);

                CartDetails::create([
                    'cart_id' => $cartCreate['id'],
                    'product_id' => $request->product_id,
                    'quantity' => 0,
                    'total_price' => 0
                ]);
                return redirect()->back()->with('success', 'cart created and product added');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function getCarts(){
        try{
            $cart = Cart::where('user_id', auth('seller')->user()->id)->first();
            $carts = CartDetails::where('cart_id', $cart->id)->get();
            return view('Website.products.carts_products', compact('carts'));
        }catch (\Exception $exception){
            return redirect()->back();
        }
    }
}
