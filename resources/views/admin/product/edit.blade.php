@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="route('admin.home')">Dashboard</a></li>
                            <li><a href="{{route('category.create')}}">Edit {{ $product->name }}</a></li>

                        </ul>
                    </div>
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


                     <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                    	 <div class="modal-body">

      	<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">

      		@csrf
            @method('put')

      	<div class="row">
      		<div class="col-sm-8">
      			<div class="form-group">
      				<label>Product Name</label>

      				<input type="text" name="name" placeholder="Enter category name" value="{{ $product->name }}" class="form-control" required>


      			</div>

      		</div>

            <div class="col-sm-8">
                <div class="form-group">
                    <label>Product Category</label>


                  <select name="category_id" class="form-control">
                    <option value="">Please select category</option>
                    @foreach($categories as $category)

                    <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach
                   </select>

                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Product Brand</label>


                  <select name="brand_id" class="form-control">
                    <option value="">Please select Brand</option>
                    @foreach($brands as $brand)

                    <option value="{{$brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                   </select>

                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>product Detail</label>

                    <input type="text" name="detail" value="{{ $product->detail }}" placeholder="Enter Product Detail" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Product Price</label>

                    <input type="number" name="price" value="{{ $product->price }}" placeholder="Enter Product Quantity" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Quantity</label>

                    <input type="number" name="quantity" value="{{ $product->quantity }}" placeholder="Enter Product Quantity" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Product Images</label>

                    <input type="file" name="images[]" multiple placeholder="Enter category name" class="form-control">


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Edit Save</button>


                </div>

            </div>
        </div>

        </form>

            <div class="col-sm-8">
                <div class="form-group">
                    <label for="detail">Image Gallary</label>


                    <table class="table table-bordered">
                        <tr>

                            @foreach ($product->productimages as $img )
                            <td>

                                <p class="mt-2">


                                    <form method="post" action="{{route('destroyimage', ['img_id' => $img->id ]) }}">
                                        @csrf
                                        @method('delete')
                                    <img src="{{asset('storage/'.$img->prod_image)}}" width="100px" height="100px" alt="">

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


      </div>



  </div>
</div>



  @endsection
