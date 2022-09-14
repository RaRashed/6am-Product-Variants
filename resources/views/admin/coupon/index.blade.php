@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li><a href="">coupon</a></li>

                        </ul>
                    </div>
                </div>
                  <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                          <h4 class="section-subtitle"><b>Coupon</b></h4>
                          <div>
                          <a class="btn btn-primary" href="{{ route('coupon.create') }}">Addnew</a>
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
                        			<th>Coupon Name</th>
                                    <th>coupon Discount</th>
                                    <th>Coupon Validity</th>
                                    <th>Valid Or NOT</th>
                                     <th>Action</th>
                        		</thead>


                        		<tbody>
                              @foreach($coupons as $key => $coupon)
                              <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$coupon->name}}</td>
                              <td>{{$coupon->discount}}</td>
                              <td>{{Carbon\Carbon::parse($coupon->validity)->format('D, d F Y')}}</td>
                              <td>
                                @if($coupon->validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="badge text-bg-primary">Valid</span>
                                   @else
                                   <span class="badge text-bg-danger">Invalid</span>
                               @endif
                            </td>


                                <td>
                                    <form action="{{ route('coupon.destroy',$coupon->id) }}" method="POST">



                                        <a class="btn btn-info" href="{{ route('coupon.show',$coupon->id) }}"><i class="fa fa-eye"></i></a>



                                        <a class="btn btn-primary" href="{{ route('coupon.edit',$coupon->id) }}"><i class="fa fa-edit"></i></a>



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
                                  th>Coupon Name</th>
                                  <th>coupon Discount</th>
                                  <th>Coupon Validity</th>
                               <th>Action</th>
                        		</tfoot>
                        	</table>



                    </div>
                </div>
            </div>
        </div>






    </div>





@endsection
