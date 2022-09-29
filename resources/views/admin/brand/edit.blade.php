@extends('admin.layouts.mmaster')

@section('content')

<div class="page-header">
    <h3 class="page-title"> brand Edit </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">brand</a></li>
        <li class="breadcrumb-item active" aria-current="page">brand Edit</li>
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
            <h4 class="card-title">brand</h4>
            <p class="card-description"> brand Edit</p>

            <form action="{{route('brand.update',$brand->id)}}" method="POST">

                @csrf
                @method('put')
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">brand Name</label>

                <div class="col-sm-9">
                    <input type="text" name="name" placeholder="Enter brand name" class="form-control" value="{{ $brand->name }}" required>
                </div>
              </div>









              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>
          </div>
        </div>

      </div>


</div>


















<div class="test" id="test">
    <h2>my name is rashed</h2>
</div>
<button type="button" id="btest">hide</button>
<button type="button" id="btest2">show</button>

<p>Click the below button to see the result:</p>

<p><a id="home" href="{{ route('brand.index') }}" title="Tutorials Point">Home</a></p>
<button>Get Attribute</button>







@endsection




@section('scripts')

@endsection





















