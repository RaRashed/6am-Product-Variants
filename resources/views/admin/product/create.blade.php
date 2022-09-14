@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="route('admin.home')">Dashboard</a></li>
                            <li><a href="{{route('category.create')}}">New Category</a></li>

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

      	<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">

      		@csrf

      	<div class="row">
      		<div class="col-sm-8">
      			<div class="form-group">
      				<label>Product Name</label>

      				<input type="text" name="name" placeholder="Enter category name" class="form-control" required>


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

                    <input type="text" name="detail" placeholder="Enter Product Detail" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Product Price</label>

                    <input type="number" name="price" placeholder="Enter Product Quantity" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Quantity</label>

                    <input type="number" name="quantity" placeholder="Enter Product Quantity" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Product Images</label>

                    <input type="file" name="images[]" multiple placeholder="Enter category name" class="form-control" required>


                </div>

            </div>
              <div class="col-sm-8">
                <div class="form-group">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>


                </div>

            </div>



      	</div>
      </form>

      </div>



  </div>
</div>



  @endsection
