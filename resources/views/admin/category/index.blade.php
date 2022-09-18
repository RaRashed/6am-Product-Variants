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
            <h4 class="card-title mb-sm-0">category</h4>
            <a href="{{ route('category.create') }}" class="text-primary ml-auto mb-3 mb-sm-0"> Add New Category</a>
          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table">
              <thead>
                <tr>
                    <th>#</th>
                  <th class="font-weight-bold">Category Name</th>
                  <th class="font-weight-bold">Sub Category</th>


                  <th class="font-weight-bold">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($categories as $key => $category)
                <tr>

                    <td>{{$key+1}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @if($category->category_id ==null)
                        Primary Category

                        @else
                        @foreach ($category->childrenCategories as $childCategory)
                        {{ $childCategory->name }}
                        @endforeach

                        @endif



                       </td>

                      <td>
                          <form action="{{ route('category.destroy',$category->id) }}" method="POST">



                              <a class="btn btn-info btn-sm" href="{{ route('category.show',$category->id) }}"><i class="fa fa-eye"></i></a>



                              <a class="btn btn-primary btn-sm" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-edit"></i></a>



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

@section('scripts')


@endsection

































































