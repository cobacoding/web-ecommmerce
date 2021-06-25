<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Category;
use App\Order;
use Auth;
class PaymentController extends Controller
{
    public function paymentMethod()
    {
    	$cartItems = Cart::content();
    	$categories = Category::all();
    	return view('payment.payment_method',compact('cartItems','categories'));
    }

    public function bankTransfer()
    {
    	$cartItems = Cart::content();
    	$categories = Category::all();
    	return view('payment.bank_transfer', compact('cartItems','categories'));
    }

    public function bankTransferSubmitOrder(Request $request)
    {
        // $this->validate($request,[
        //     'full_name' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'phone' => 'required|numeric',
        //     'zip' => 'required|numeric',
        // ]);

        $order = New Order;
        $order->user_id = Auth::user();
        foreach(Cart::content() as $cart){
            $order=Auth::user()->orders()->create([
                'qty' => $cart->qty,
                'tax' => $cart->tax*$cart->qty,
                'subtotal' => $cart->subtotal,
                'total' => $cart->tax*$cart->qty+$cart->subtotal,
                'title' => $cart->name,
                'size' => $cart->options->has('size')?$cart->options->size:'',
                'image' => $cart->options->has('image')?$cart->options->image:'',
                'full_name' => $request->full_name,
                'address' => $request->address,
                'city' => $request->city,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'status' => 0,

            ]);
        }
        $order->save();
        Cart::destroy();
        //return back()->withMessage('success to payment');
        return redirect()->route('thanks');
    }

    public function paymentcard()
    {
        $cartItems = Cart::content();
        $categories = Category::all();
        return view('payment.paymentcard', compact('cartItems','categories'));
    }

     public function paymentcardSubmitOrder(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric',
            'zip' => 'required|numeric',
        ]);
        
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_i25gHLbm5DRRhE2wviaqiXSM");//ini belom dibenerein

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        foreach(Cart::content() as $cart){
            $customer = \Stripe\Customer::create([
                'source' => $token,
                'email' => Auth::user()->name,
            ]);
            $charge = \Stripe\Charge::create([
                'amount' => Cart::total(),
                'currency' => 'usd',
                'description' => $cart->name,
                'customer' => $customer->id,
            ]);
        }

        $order = New Order;
        $order->user_id = Auth::user();
        foreach(Cart::content() as $cart){
            $order=Auth::user()->orders()->create([
                'qty' => $cart->qty,
                'tax' => $cart->tax*$cart->qty,
                'subtotal' => $cart->subtotal,
                'total' => $cart->tax*$cart->qty+$cart->subtotal,
                'title' => $cart->name,
                'size' => $cart->options->has('size')?$cart->options->size:'',
                'image' => $cart->options->has('image')?$cart->options->image:'',
                'full_name' => $request->full_name,
                'address' => $request->address,
                'city' => $request->city,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'status' => 0,

            ]);
        }
        $order->save();
        Cart::destroy();
        //return back()->withMessage('success to paymentcar');
        return redirect()->route('thanks');
    }

    public function thanks()
    {
        $cartItems = Cart::content();
        $categories = Category::all();
        return view('payment.thanks', compact('cartItems','categories'));
    }
}
