<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;
class StripeController extends Controller
{
    /**
     * payment view
     */


    public function handleGet()
    {


       $cart_id =session('current_user');


       $cart = session($cart_id);

       $cart_keeper = [];

       if (session()->has($cart_id)) {
           foreach ($cart as $cartItem) {



               array_push($cart_keeper, $cartItem);

           }
       }
       session()->put($cart_id, $cart_keeper);




        return view('stripe.home',['cart_id'=>$cart_id]);
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {




        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }
}
