<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
class StripeController extends Controller
{
    public function StripeOrder(Request $request){

                    $total_amount = round(Cart::total());
                    \Stripe\Stripe::setApiKey('sk_test_51P5RZNRr4JgrtyczEwCGH5GsXLApMTGndXwcL7blHWEghweivCkI1bSOA6sUqsRkRXWi9u9XOYU49yypIhrrlPWN00MppmQ9bY');

                    $token = $_POST['stripeToken'];
                    $charge = \Stripe\Charge::create([
                    'amount' => $total_amount*100,
                    'currency' => 'eur',
                    'description' => 'YEKIX Outlet',
                    'source' => $token,
                    'metadata' => ['order_id' => uniqid()],
                    ]);
                    //dd($charge);
                $order_id = Order::insertGetId([
                        'user_id' => Auth::id(),
                        'shipping_country' => $request->country,
                        'shipping_judet' => $request->judet,
                        'shipping_city' => $request->city,
                        'shipping_address' =>$request->address,
                        'shipping_name' => $request->name,
                        'shipping_email' => $request->email,
                        'shipping_phone' => $request->phone,
                        'post_code' => $request->post_code,
                        'notes' => $request->notes,
               

                        'payment_method' => 'Stripe',
                        'transaction_id' => $charge->balance_transaction,
                        'currency' => $charge->currency,
                        'amount' => $total_amount,
                        'order_number' => $charge->metadata->order_id,

                    ]);
               
                    $carts = Cart::content();
                    foreach ($carts as $cart) {
                        OrderItem::insert([
                            'order_id' => $order_id, 
                            'product_id' => $cart->id,
                            'color' => $cart->options->color,
                            'size' => $cart->options->size,
                            'qty' => $cart->qty,
                            'price' => $cart->price,
                            'created_at' => Carbon::now(),
               
                        ]);
                    }
                    Cart::destroy();
               
                    $notification = array(
                           'message' => 'Your Order Place Successfully',
                           'alert-type' => 'success'
                       );
               
                       return redirect()->route('dashboard')->with($notification);
               
               
                   } // end method 
} // end method 





