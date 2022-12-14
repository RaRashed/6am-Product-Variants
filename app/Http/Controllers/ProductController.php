<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use Helpers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Str;

class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $brand;
    public function __construct(Product $product, Category $category,Brand $brand)
    {
        $this->product = $product;
        $this->category=$category;
        $this->brand=$brand;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = $this->category::all();
       // $products=Product::all();
       $products = $this->product::all();
       //dd($products);
        return view('admin.product.index',['categories'=>$categories,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category::all();
        $brands= $this->brand::all();
        $colors=DB::table('colors')->get();

//dd($colors);
       $attributes=DB::table('attributes')->get();
        return view('admin.product.create',['categories'=>$categories,'brands'=>$brands,'colors'=>$colors,'attributes'=>$attributes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $request->validate([
            'name' => 'required',
            'product_price' => 'required',
            'category_id'=>'required',
            'brand_id' => 'required',
            'detail' => 'required',
            'images' =>'required'

        ]);

       // print_r($request->all());

      $product = new Product();
      $product->name =$request->name;
      $product->category_id =$request->category_id;
      $product->brand_id =$request->brand_id;
      //$product->quantity =$request->quantity;
      $product->product_price =$request->product_price;
      //$product->variant_product=1;
      $product->detail =$request->detail;


      if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
        $product->colors = json_encode($request->colors);
    } else {
        $colors = [];
        $product->colors = json_encode($colors);
    }
    $choice_options = [];
    if ($request->has('choice')) {
        foreach ($request->choice_no as $key => $no) {

            $str = 'choice_options_' . $no;
           // dd($request[$str]);


            $item['name'] = 'choice_' . $no;

            $item['title'] = $request->choice[$key];
            //dd($item['title'] );


            $item['options'] = explode(',', implode('|', $request[$str]));
            //$item['options'] = implode(',', $request[$str]);

            //dd($item['options']);
           // return print_r($item['options'] );
            array_push($choice_options, $item);
        }
    }
    //return print_r($choice_options);


    $product->choice_options = json_encode($choice_options);



    $options = [];
    if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
       // $colors_active = 1;
        array_push($options, $request->colors);
    }

    if ($request->has('choice_no')) {
        foreach ($request->choice_no as $key => $no) {
            $name = 'choice_options_' . $no;

            $my_str = implode('|', $request[$name]);
            //return print_r($my_str);
            array_push($options, explode(',', $my_str));

        }

    }
    //dd($options);





    $combinations = [[]];

    foreach ($options as $property => $property_values) {

        $tmp = [];
        foreach ($combinations as $combinations_item) {

            foreach ($property_values as $property_value) {

                $tmp[] = array_merge($combinations_item, [$property => $property_value]);

            }
        }
        $combinations = $tmp;


    }
   // dd($combinations);


    // foreach ($options as $property => $property_values) {
    //     dd($property_values);
    //     $tmp = [];
    //     foreach ($combinations as $combinations_item) {
    //         foreach ($property_values as $property_value) {
    //             $tmp[] = array_merge($combinations_item, [$property => $property_value]);
    //         }
    //     }
    //     $combinations = $tmp;

    // }

    $variations = [];

    if (count($combinations[0]) > 0) {
        foreach ($combinations as $key => $combination) {
            $str = '';
            foreach ($combination as $k => $item) {
                if ($k > 0) {
                    $str .= '-' . str_replace(' ', '', $item);
                } else {
                    if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                        $color_name = DB::table('colors')->where('id', $item)->first()->name;
                        $str .= $color_name;
                    } else {
                        $str .= str_replace(' ', '', $item);
                    }
                }
            }
            $item = [];
            $item['type'] = $str;
            $item['price'] = abs($request['price_' . str_replace('.', '_', $str)]);
            $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
            $item['qty'] = abs($request['qty_' . str_replace('.', '_', $str)]);
            array_push($variations, $item);

        }

    }
    //return print_r(json_encode($variations));
$product->variation =json_encode($variations);
//dd($variations);
$product->attributes = json_encode($request->choice_attributes);
$product->sku=Str::slug($request->name);


//$product->price=1;
//$product->quantity=2;
//dd($product);
$product->save();

       foreach($request->file('images') as $img)
        {

        $imgPath =$img->store('productImages');
        $imgProduct = new ProductImage();
        $imgProduct->product_id = $product->id;
        $imgProduct->prod_image = $imgPath;
       // $imgPath->move(public_path('images'),$imgProduct->prod_image);
        $imgProduct->save();


        }



      return redirect(route('product.create'))->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product::find($id);
        //dd($product->productimages);
       return view('admin.product.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=$this->product::find($id);
        //dd($product);
        $categories=$this->category::all();
         $product->colors = json_decode($product->colors);
         $product->attributes = json_decode($product->attributes);

         $product->choice_options=json_decode($product->choice_options);
        // dd($product->colors);

        $colors=Color::all();
        $attributes=Attribute::all();
        $brands= $this->brand::all();
        return view('admin.product.edit',['categories'=>$categories,'brands' => $brands,'product'=>$product,'colors'=>$colors,'attributes'=>$attributes]);

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
       // dd($request->all());
        $request->validate([
            'name' => 'required',
            'product_price' => 'required',
            'category_id'=>'required',
            'brand_id' => 'required',
            'detail' => 'required',
            'images' =>'required'
           ]);


           $product = Product::find($id);
        $product->name =$request->name;
        $product->category_id =$request->category_id;
        $product->brand_id =$request->brand_id;
        //$product->quantity =$request->quantity;
        $product->product_price =$request->product_price;
        //$product->variant_product=1;
        $product->detail =$request->detail;


        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = [];
            $product->colors = json_encode($colors);
        }
        $choice_options = [];
        if ($request->has('choice')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;
                $item['name'] = 'choice_' . $no;
                $item['title'] = $request->choice[$key];
                $item['options'] = explode(',', implode('|', $request[$str]));
                array_push($choice_options, $item);
            }
        }
        $product->choice_options = json_encode($choice_options);
        $variations = [];
        //combinations start
        $options = [];
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }
        $combinations = [[]];

        foreach ($options as $property => $property_values) {

            $tmp = [];
            foreach ($combinations as $combinations_item) {

                foreach ($property_values as $property_value) {

                    $tmp[] = array_merge($combinations_item, [$property => $property_value]);

                }
            }
            $combinations = $tmp;


        }
        $variations = [];

        if (count($combinations[0]) > 0) {
            foreach ($combinations as $key => $combination) {
                $str = '';
                foreach ($combination as $k => $item) {
                    if ($k > 0) {
                        $str .= '-' . str_replace(' ', '', $item);
                    } else {
                        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                            $color_name = DB::table('colors')->where('id', $item)->first()->name;
                           // dd($color_name);
                            $str .= $color_name;
                        } else {
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }
               // dd($str);

                $item = [];
                $item['type'] = $str;
                $item['price'] = abs($request['price_' . str_replace('.', '_', $str)]);
              // dd( $item['price'] );

                $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                $item['qty'] = abs($request['qty_' . str_replace('.', '_', $str)]);
                array_push($variations, $item);

            }
        }
        //dd($variations);



        // if ($validator->fails()) {
        //     return back()->withErrors($validator)
        //         ->withInput();
        // }

        //combinations end
        $product->variation = json_encode($variations);


        $product->attributes = json_encode($request->choice_attributes);



            $product->save();


        //   if($request->hasFile('images')){
        //        foreach($request->file('images') as $img)
        //             {

        //            $imgPath =$img->store('productImages');
        //             $imgData = new ProductImage();
        //             $imgData->product_id = $product->id;
        //             $imgData->prod_image = $imgPath;
        //             $imgData->save();

        //             }
        //         }
                return redirect(route('product.index'))->with('success', 'product Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=$this->product::find($id);

        $data->delete();

        return redirect(route('product.index'))->with('success', 'product deleted Successfully');

    }

    public function Imagedestroy($img_id)
    {
        $data=ProductImage::where('id',$img_id)->first();

        Storage::delete($data->prod_image);
        ProductImage::where('id',$img_id)->delete();
        return redirect()->back();


    }

    public function sku_combination(Request $request)
    {
//        return $request;
        $options = [];
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

      $product_price = $request->product_price;
       //$product_name = $request->name[array_search('en', $request->lang)];
         $product_name = $request->name;
        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('', $request[$name]);

                array_push($options, explode(',', $my_str));
            }
        }

        $combinations = [[]];

        foreach ($options as $property => $property_values) {
            $tmp = [];
            foreach ($combinations as $combinations_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($combinations_item, [$property => $property_value]);
                }
            }
            $combinations = $tmp;

        }



       //$products =DB::table('colors')->get()->all();
       //dd($products);
        return response()->json([
            'view' => view('admin.mpartials.sku_combination', compact('combinations','options','product_name', 'product_price', 'colors_active'))->render(),

        ]);
    }


























}
