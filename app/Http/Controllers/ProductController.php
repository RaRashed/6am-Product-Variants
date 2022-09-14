<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.product.create',['categories'=>$categories,'brands'=>$brands]);
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
}
