<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\frontend\IndexController;
class CartController extends Controller
{
        public function CartStore(Request $request, $id){
            $product = Product::findOrFail($id);
            if ($product->discount_price == NULL) {
                Cart::add([
                    'id' => $id, 
                    'name' => $request->product_name, 
                    'qty' => $request->qty, 
                    'price' => $product->selling_price,
                    'weight' => 1, 
                    'options' => [
                        'image' => $product->product_thumbnail,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);
    
                return response()->json(['success' => 'Successfully Added on Your Cart']);
    
            }else{
    
                Cart::add([
                    'id' => $id, 
                    'name' => $product->product_name_en, 
                    'qty' => $request->qty, 
                    'price' => $product->discount_price,
                    'weight' => 1, 
                    'options' => [
                        'image' => $product->product_thumbnail,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);
                return response()->json(['success' => 'Successfully Added on Your Cart']);
            }
    
        } // end mehtod 

        public function MiniCartStore(){
            $carts = Cart::content();       //metode disponibile din package instalat bumbummen99
            $cartQty = Cart::count();
            $cartTotal= Cart::total();

            return response()->json(array(
                'carts' => $carts,            //pasam in response din main_master in format jason ca array
                'cartQty' => $cartQty,
                'cartTotal' => round($cartTotal),
            ));
        }
        public function MiniCartRemove($rowId){
            Cart::remove($rowId);return response()->json(['error' => 'Product removed']);
        }

        public function Checkout(){
            if (Cart::total() > 0){
                $carts = Cart::content();       //metode disponibile din package instalat bumbummen99
                $cartQty = Cart::count();
                $cartTotal= Cart::total();
                return view('frontend.checkout.checkout_view', compact('carts','cartQty','cartTotal'));
            }else{
                return redirect()->to('/');
            }

        }

}