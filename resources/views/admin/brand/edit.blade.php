@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li><a>Edit brand</a></li>

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

      	<form action="{{route('brand.update',$brand->id)}}" method="POST">

      		@csrf
            @method('put')

      	<div class="row">
      		<div class="col-sm-8">
      			<div class="form-group">
      				<label>brand Name</label>

      				<input type="text" name="name" value="{{ $brand->name }}" class="form-control" required>


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
