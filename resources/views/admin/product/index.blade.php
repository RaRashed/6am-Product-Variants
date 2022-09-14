@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li><a href="">Category</a></li>

                        </ul>
                    </div>
                </div>
                  <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                          <h4 class="section-subtitle"><b>Product</b></h4>
                          <div>
                          <a class="btn btn-primary" href="{{ route('product.create') }}">Addnew</a>
                          </div>
                          @if ($message = Session::get('success'))

                          <div class="alert alert-success">

                              <p>{{ $message }}</p>

                          </div>

                      @endif
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">


                        		<thead>
                        			<th>#</th>
                        			<th>Product Name</th>
                                     <th>Product Category</th>
                                     <th>Product Brand</th>
                                     <th>Product Price</th>
                                     <th>Product Quantity</th>

                                      <th>Action</th>
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



                                        <a class="btn btn-info" href="{{ route('product.show',$product->id) }}"><i class="fa fa-eye"></i></a>



                                        <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-edit"></i></a>



                                        @csrf

                                        @method('DELETE')



                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                    </form>
                                </td>
                              </tr>
                                @endforeach

                        		</tbody>



                        		<tfoot>
                        		  <th>#</th>
                                  <th>Product Name</th>
                                  <th>Product Category</th>
                                  <th>Product Brand</th>
                                  <th>Product Price</th>
                                  <th>Product Quantity</th>

                              <th>Action</th>
                        		</tfoot>
                        	</table>



                    </div>
                </div>
            </div>
        </div>






    </div>





@endsection
