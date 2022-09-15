@extends('admin.layouts.mmaster')

@section('content')




<div class="page-header">
    <h3 class="page-title"> Form elements </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
      </ol>
    </nav>
  </div>
  @if ($message = Session::get('success'))

  <div class="alert alert-success">

      <p>{{ $message }}</p>

  </div>

@endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Product</h4>
            <p class="card-description"> Product Add</p>




      	<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
          @method('put')

              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{ $product->name }}"  placeholder="Enter category name" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-9">
                    <select name="category_id" class="form-control">

                    @foreach($categories as $category)


                    <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach
                   </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Brand</label>
                <div class="col-sm-9">
                    <select name="brand_id" class="form-control">

                    @foreach($brands as $brand)


                    <option value="{{$brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                   </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Details</label>
                <div class="col-sm-9">
                    <input type="text" name="detail" value="{{ $product->detail }}" placeholder="Enter Product Detail" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">

                    <input type="number" name="price" value="{{ $product->price }}"  placeholder="Enter Product Quantity" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" name="quantity" value="{{ $product->quantity }}"  placeholder="Enter Product Quantity" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Product Images</label>
                <div class="col-sm-9">
                    <input type="file" name="images[]" multiple placeholder="Enter category name" class="form-control" required>
                </div>
              </div>



              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input"> Remember me </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>





          <table class="table table-bordered">
            <tr>

                @foreach ($product->productimages as $img )
                <td>

                    <p class="mt-2">


                        <form method="post" action="{{route('destroyimage', ['img_id' => $img->id ]) }}">
                            @csrf
                            @method('delete')
                        <img src="{{asset('storage/'.$img->prod_image)}}" alt="">

                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>


                    </p>



                </td>
                @endforeach





            </tr>

        </table>
        </div>


      </div>


</div>







  @endsection
