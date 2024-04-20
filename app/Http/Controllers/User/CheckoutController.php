<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request){
        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
        $data['shipping_country'] = $request->shipping_country;
        $data['shipping_judet'] = $request->shipping_judet;
        $data['shipping_city'] = $request->shipping_city;
    	$data['shipping_address'] = $request->shipping_address;
    	$data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
    	$data['post_code'] = $request->post_code;
    	$data['notes'] = $request->notes;
        $cartTotal = Cart::total();

    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data','cartTotal'));
    }
}
}
