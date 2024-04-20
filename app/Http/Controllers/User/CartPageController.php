<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;


class CartPageController extends Controller
{
    public function MyCart(){
        return view('frontend.cart.view_mycart');
    }
    public function GetCartProduct(){
            $carts = Cart::content();       //metode disponibile din package instalat bumbummen99
            $cartQty = Cart::count();
            $cartTotal= Cart::total();

            return response()->json(array(
                'carts' => $carts,            //pasam in response din main_master in format jason ca array
                'cartQty' => $cartQty,
                'cartTotal' => round($cartTotal),
            ));
        }
    public function RemoveCartProduct($rowId){
            Cart::remove($rowId);
            return response()->json(['success' => 'Successfully Remove From Cart']);
    }
    
}
