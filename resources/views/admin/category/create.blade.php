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


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Brand</h4>
            <p class="card-description"> Brand Add</p>

             <form action="{{route('category.store')}}" class="product_form" id="product_form" method="POST" enctype="multipart/form-data">

                @csrf
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Name</label>

                <div class="col-sm-9">
                    <input type="text" name="name" placeholder="Enter Brand name" class="form-control" required>
                </div>
              </div>



              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Parent Category</label>

                <div class="col-sm-9">

                  <select name="category_id" class="form-control">
                    <option value="">Please select a parent category</option>
                    @foreach($categories as $category)

                    <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach
                   </select>
                </div>
              </div>






              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>
          </div>
        </div>

      </div>


</div>


























@endsection


























