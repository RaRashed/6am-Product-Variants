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
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Brand</h4>
            <a href="{{ route('product.create') }}" class="text-primary ml-auto mb-3 mb-sm-0"> Add New Product</a>

          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table">
              <thead>

                  <th class="font-weight-bold">#</th>
                  <th class="font-weight-bold">Product Name</th>
                   <th class="font-weight-bold">Product Category</th>
                   <th class="font-weight-bold">Product Brand</th>
                   <th class="font-weight-bold">Product Price</th>
                   <th class="font-weight-bold">Product Quantity</th>

                    <th class="font-weight-bold">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($products as $key => $product)
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->name}}</td>
               <td>{{ $product->category->name }}</td>
               <td>{{ $product->brand->name }}</td>
               <td>{{ $product->price }}</td>
               <td>{{ $product->quantity }}</td>


                  <td>
                      <form action="{{ route('product.destroy',$product->id) }}" method="POST">



                          <a class="btn btn-info btn-sm" href="{{ route('product.show',$product->id) }}"><i class="fa fa-eye"></i></a>



                          <a class="btn btn-primary btn-sm" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-edit"></i></a>



                          @csrf

                          @method('DELETE')



                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                      </form>
                  </td>
                </tr>
                  @endforeach




              </tbody>
            </table>
          </div>

{{-- <div class="d-flex mt-4 flex-wrap">
            <p class="text-muted">Showing 1 to 10 of 57 entries</p>
            <nav class="ml-auto">
              <ul class="pagination separated pagination-info">
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </nav>
          </div> --}}

        </div>
      </div>
    </div>
  </div>









@endsection
