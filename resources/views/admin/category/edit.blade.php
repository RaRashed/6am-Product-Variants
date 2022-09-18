@extends('admin.layouts.mmaster')

@section('content')

<div class="page-header">
    <h3 class="page-title"> Category Edit </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category Edit</li>
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
            <h4 class="card-title">Category</h4>
            <p class="card-description"> Category Edit</p>

            <form action="{{route('category.update',$category->id)}}" method="POST">

                @csrf
                @method('put')
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Name</label>

                <div class="col-sm-9">
                    <input type="text" name="name" placeholder="Enter category name" class="form-control" value="{{ $category->name }}" required>
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


























