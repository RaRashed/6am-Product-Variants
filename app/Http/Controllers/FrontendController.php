<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    protected $product;
    protected $coupon;
    public function __construct(Product $product, Coupon $coupon)
    {
        $this->product=$product;
        $this->coupon=$coupon;

    }

    public function index()
    {
        $products =$this->product::all();
        $convert_value=DB::table('currencies')->where('is_default',1)->first();
        //dd($convert_value);
        return view('frontend.index',['products' => $products,'convert_value'=>$convert_value]);
    }
    public function cart()
    {
        $products=$this->product::all();
        return view('frontend.cart',['products' => $products]);
    }
    public function addToCart($id)
    {
        $product = $this->product::find($id);

        if(!$product) {

            abort(404);

        }


        $cart = session()->get('cart');







        // cart increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);


            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [

            "name" => $product->name,
            "quantity" => 1,
            "product_price" => $product->product_price
            //"prod_image" => $product->id,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function applyCoupon(Request $request)

    {

       $coupon =Session::get('coupon');
       //dd($coupon);
       $coupon = Coupon::where('name', $request->coupon)->first();


       if(!$coupon){
           return redirect()->back()->with('warning', 'Coupon Code Not Found');
       }
       $coupons =[
        'name' => $coupon->name,
        'id' => $coupon->id,
        'discount' => $coupon->discount,
        'validity' =>$coupon->validity

       ];

       session()->put('coupon',$coupons);
       $check_coupon = session('coupon');

       if($check_coupon && $check_coupon['validity'] >= Carbon::now()){

        return redirect()->back()->with('success', 'Coupon Has Been Applied');

       }

    else{

        return redirect()->back()->with('fail','Coupon code expired');
      }


    }







    public function checkout()
    {
        $coupons=Coupon::all();
        return view('frontend.checkout',['coupons'=>$coupons]);
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
           return redirect()->back()->with('success', 'Product removed successfully');
        }
    }
}
