<?php

namespace App\Http\Controllers;

use App\Models\Product;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $category = $request->query('category_id');

        $keyword = $request->query('search', false);

        $categories = Category::all();

        $key = explode(' ', $keyword);

        $products = Product::all();


        $cart_id = 'wc-'.rand(10,1000);


        if(!session()->has('current_user')){
            session()->put('current_user',$cart_id);
        }

        if(!session()->has('cart_name'))
        {
            if(!in_array($cart_id,session('cart_name')??[]))
            {
                session()->push('cart_name', $cart_id);
            }
        }
        //dd($cart_id);

        return view('admin.pos.index',compact('categories','cart_id','category','keyword','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function quick_view(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $colors=Color::all();

        return response()->json([
            'success' => 1,
            'view' => view('admin.pos.quick-view',['product'=>$product,'colors'=>$colors])->render(),
        ]);
    }


    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;
        $price = 0;

if($request->has('color'))
{

    $str = Color::where('code', $request['color'])->first()->name;
}


        foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
            if ($str != null) {
                $str .= '-' . str_replace(' ', '', $request[$choice->name]);

            }
            else {
                $str .= str_replace(' ', '', $request[$choice->name]);
            }
        }

        if ($str != null) {
            $count = count(json_decode($product->variation));
            for ($i = 0; $i < $count; $i++) {
                if (json_decode($product->variation)[$i]->type == $str) {
                    // $tax = Helpers::tax_calculation(json_decode($product->variation)[$i]->price, $product['tax'], $product['tax_type']);
                    // $discount = Helpers::get_product_discount($product, json_decode($product->variation)[$i]->price);
                    $price = json_decode($product->variation)[$i]->price ;//- $discount + $tax;
                    $quantity = json_decode($product->variation)[$i]->qty;
                }
            }
        } else {
            //$tax = Helpers::tax_calculation($product->unit_price, $product['tax'], $product['tax_type']);
            //$discount = Helpers::get_product_discount($product, $product->unit_price);
            $price = $product->product_price;// - $discount + $tax;
           // $quantity = $product->current_stock;
        }

        return [
            'price' =>$price * $request->quantity,
            'str' =>$str,

            'quantity' => $quantity
        ];

    }



    
    public function addToCart(Request $request)
    {
        $cart_id = session('current_user');

        $user_id = 0;
        $user_type = 'wc';
        if(Str::contains(session('current_user'), 'sc'))
        {
            $user_id = explode('-',session('current_user'))[1];
            $user_type = 'sc';
        }

        $product = Product::find($request->id);
       

        $data = array();
        $data['id'] = $product->id;
        $str = '';
        $variations = [];
        $price = 0;
        $p_qty = 0;
        $current_qty = 0;

        //check the color enabled or disabled for the product
        if ($request->has('color')) {
            $str = Color::where('code', $request['color'])->first()->name;
            $variations['color'] = $str;
        }
        //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
        foreach (json_decode($product->choice_options) as $key => $choice) {
            $data[$choice->name] = $request[$choice->name];
            $variations[$choice->title] = $request[$choice->name];
            if ($str != null) {
                $str .= '-' . str_replace(' ', '', $request[$choice->name]);
            } else {
                $str .= str_replace(' ', '', $request[$choice->name]);
            }
        }

        $data['variations'] = $variations;
        $data['variant'] = $str;
        $cart = session($cart_id);

        if (session()->has($cart_id) && count($cart) > 0) {

            foreach ($cart as $key => $cartItem) {
                if (is_array($cartItem) && $cartItem['id'] == $request['id'] && $cartItem['variant'] == $str) {
                    return response()->json([
                        'data' => 1,
                        'view' => view('admin.pos.cart_add',['cart_id'=>$cart_id])->render()
                    ]);
                }
            }


        }

        //Check the string and decreases quantity for the stock
        if ($str != null) {

            $count = count(json_decode($product->variation));
            for ($i = 0; $i < $count; $i++) {

                if (json_decode($product->variation)[$i]->type == $str) {
                    $p_qty = json_decode($product->variation)[$i]->qty;
                    $current_qty = $p_qty - $request['quantity'];
                    if($current_qty<0)
                    {
                        return response()->json([
                            'data' => 0,
                            'view' => view('admin.pos.cart_add',['cart_id'=>$cart_id])->render()
                        ]);
                    }

                    $price = json_decode($product->variation)[$i]->price;

                }
            }
        } else {
            $p_qty = $product->current_stock;
            $current_qty = $p_qty - $request['quantity'];
            if($current_qty<0)
            {
                return response()->json([
                    'data' => 0,
                    'view' => view('admin.pos.cart_add',['cart_id'=>$cart_id])->render()
                ]);
            }
            $price = $product->unit_price;
        }

        $data['quantity'] = $request['quantity'];
        $data['price'] = $price;
        $data['name'] = $product->name;
      //  $data['discount'] = Helpers::get_product_discount($product, $price);
        $data['image'] = $product->thumbnail;


        if (session()->has($cart_id)) {
            $keeper = [];
            foreach (session($cart_id) as $item) {
                array_push($keeper, $item);
            }
            array_push($keeper, $data);
            session()->put($cart_id, $keeper);
        } else {
            session()->put($cart_id, [$data]);
        }

        return response()->json([
            'data' => $data,
            'view' => view('admin.pos.cart_add',['cart_id'=>$cart_id])->render()
        ]);
    }
    public function cart_items()
    {
        return view('admin-views.pos._cart');
    }

    public function emptyCart(Request $request)
    {
        $cart_id = session('current_user');
        $user_id = 0;
        $user_type = 'wc';
        if(Str::contains(session('current_user'), 'sc'))
        {
            $user_id = explode('-',session('current_user'))[1];
            $user_type = 'sc';
        }
        session()->forget($cart_id);
        return response()->json([
            'user_type'=>$user_type,
            'view' => view('admin-views.pos._cart',compact('cart_id'))->render()], 200);
    }
    public function removeFromCart(Request $request)
    {
        $cart_id = session('current_user');
        $user_id = 0;
        $user_type = 'wc';

        if(Str::contains(session('current_user'), 'sc'))
        {
            $user_id = explode('-',session('current_user'))[1];
            $user_type = 'sc';
        }

        $cart = session($cart_id);
        $cart_keeper = [];

        if (session()->has($cart_id) && count($cart) > 0) {
            foreach ($cart as $key=>$cartItem) {
                if ($key != $request['key']) {
                    array_push($cart_keeper, $cartItem);
                }
            }
        }
        session()->put($cart_id, $cart_keeper);

        return response()->json(['view' => view('admin-views.pos._cart',compact('cart_id'))->render()], 200);
    }
    public function updateQuantity(Request $request)
    {
        $cart_id = session('current_user');
        $user_id = 0;
        $user_type = 'wc';
        if(Str::contains(session('current_user'), 'sc'))
        {
            $user_id = explode('-',session('current_user'))[1];
            $user_type = 'sc';
        }

        if($request->quantity>0){

            $product = Product::find($request->key);
            $product_qty =0;
            $cart = session($cart_id);
            $keeper=[];

            foreach ($cart as $item){

                if (is_array($item)) {

                    if ($item['id'] == $request->key) {
                        $str = '';
                        if($item['variations'])
                        {
                            foreach($item['variations'] as $v)
                            {
                                if($str!=null)
                                {
                                    $str .= '-' . str_replace(' ', '', $v);
                                }else{
                                    $str .= str_replace(' ', '', $v);
                                }
                            }
                        }

                        if ($str != null) {

                            $count = count(json_decode($product->variation));
                            for ($i = 0; $i < $count; $i++) {

                                if (json_decode($product->variation)[$i]->type == $str) {

                                    $product_qty = json_decode($product->variation)[$i]->qty;

                                }
                            }
                        } else
                        {
                            $product_qty = $product->current_stock;
                        }

                        $qty = $product_qty - $request->quantity ;

                        if($qty < 0)
                        {
                            return response()->json([
                                'qty' =>$qty,
                                'view' => view('admin-views.pos._cart',compact('cart_id'))->render()
                                ]);
                        }
                        $item['quantity'] = $request->quantity;
                    }
                    array_push($keeper,$item);
                }
            }
            session()->put($cart_id, $keeper);

            return response()->json([
                'qty_update'=>1,
                'view' => view('admin-views.pos._cart',compact('cart_id'))->render()
            ], 200);
        }else{
            return response()->json([
                'upQty'=>'zeroNegative',
                'view' => view('admin-views.pos._cart',compact('cart_id'))->render()
            ]);
        }
    }


    public function get_cart_id(Request $request)
    {
        $cart_id = session('current_user');
        $user_id = 0;
        $user_type = 'wc';
        if(Str::contains(session('current_user'), 'sc'))
        {
            $user_id = explode('-',session('current_user'))[1];
            $user_type = 'sc';
        }
        $cart = session($cart_id);
        $cart_keeper = [];
        if (session()->has($cart_id) && count($cart) > 0) {
            foreach ($cart as $cartItem) {
                array_push($cart_keeper, $cartItem);
            }
        }
        session()->put(session('current_user') , $cart_keeper);
        $user_id = explode('-',session('current_user'))[1];
        $current_customer ='';
        if(explode('-',session('current_user'))[0]=='wc')
        {
            $current_customer = 'Walking Customer';
        }else{
            $current =User::where('id',$user_id)->first();
            $current_customer = $current->f_name.' '.$current->l_name. ' (' .$current->phone.')';
        }
        return response()->json([
            'current_user'=>session('current_user'),'cart_nam'=>session('cart_name')??'',
            'current_customer'=>$current_customer,
            'view'=> view('admin.pos.add_cart',compact('cart_id'))->render()]);
    }
}
