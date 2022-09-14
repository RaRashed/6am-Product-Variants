@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li><a href="">New Brand</a></li>

                        </ul>
                    </div>
                </div>
                @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif


                     <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                    	 <div class="modal-body">

      	<form action="{{route('coupon.store')}}" method="POST">

      		@csrf

      	<div class="row">
      		<div class="col-sm-8">
      			<div class="form-group">
      				<label>Coupon Name</label>

      				<input type="text" name="name" placeholder="Enter Brand name" class="form-control" required>


      			</div>

      		</div>
              <div class="col-sm-8">
                <div class="form-group">
                    <label>Discount</label>

                    <input type="number" name="discount" placeholder="Enter Discount" class="form-control" required>


                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Validity</label>

                    <input type="date" name="validity" placeholder="Validity" class="form-control" required>


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
