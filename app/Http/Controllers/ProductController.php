<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use Helpers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

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
       //$attributes=DB::table('attributes')->get();
        return view('admin.product.create',['categories'=>$categories,'brands'=>$brands,'colors'=>$colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id'=>'required',
            'brand_id' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'images' =>'required'

        ]);

      $product = new Product();
      $product->name =$request->name;
      $product->category_id =$request->category_id;
      $product->brand_id =$request->brand_id;
      $product->quantity =$request->quantity;
      $product->price =$request->price;
      $product->detail =$request->detail;


      if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
        $p->colors = json_encode($request->colors);
    } else {
        $colors = [];
        $p->colors = json_encode($colors);
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
    $p->choice_options = json_encode($choice_options);
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
    //Generates the combinations of customer choice options

    $combinations = Helpers::combinations($options);

    $variations = [];
    $stock_count = 0;
    if (count($combinations[0]) > 0) {
        foreach ($combinations as $key => $combination) {
            $str = '';
            foreach ($combination as $k => $item) {
                if ($k > 0) {
                    $str .= '-' . str_replace(' ', '', $item);
                } else {
                    if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                        $color_name = Color::where('code', $item)->first()->name;
                        $str .= $color_name;
                    } else {
                        $str .= str_replace(' ', '', $item);
                    }
                }
            }
            $item = [];
            $item['type'] = $str;
            $item['price'] = BackEndHelper::currency_to_usd(abs($request['price_' . str_replace('.', '_', $str)]));
            $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
            $item['qty'] = abs($request['qty_' . str_replace('.', '_', $str)]);
            array_push($variations, $item);
            $stock_count += $item['qty'];
        }
    } else {
        $stock_count = (integer)$request['current_stock'];
    }

    if ($validator->errors()->count() > 0) {
        return response()->json(['errors' => Helpers::error_processor($validator)]);
    }

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
        $categories=$this->category::all();
        $brands= $this->brand::all();
        return view('admin.product.edit',['categories'=>$categories,'brands' => $brands,'product'=>$product]);

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
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'brand_id' =>'required',
            'price' => 'required',
            'quantity' =>'required',
            'detail' => 'required',
           ]);


        $product = $this->product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->detail = $request->detail;
          $product->update();

          if($request->hasFile('images')){
               foreach($request->file('images') as $img)
                    {

                   $imgPath =$img->store('productImages');
                    $imgData = new ProductImage();
                    $imgData->product_id = $product->id;
                    $imgData->prod_image = $imgPath;
                    $imgData->save();

                    }
                }
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

        $unit_price = $request->unit_price;
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
            'view' => view('admin.mpartials.sku_combination', compact('combinations','options','product_name', 'unit_price', 'colors_active'))->render(),

        ]);
    }


























    public function combination(Request $request)
    {
//        return $request;
        $options = [];
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
       //$product_name = $request->name[array_search('en', $request->lang)];
         $product_name = $request->name;
        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('', $request[$name]);

                array_push($options, explode(',', $my_str));
            }
        }

       $combinations =combinations($options);
       $products =DB::table('colors')->get()->all();
       //dd($products);
        return response()->json([
            $options

        ]);
    }
}
