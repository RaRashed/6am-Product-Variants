@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('admin.exam_category')}}">Category Edit</a></li>
                            
                        </ul>
                    </div>
                </div>



                     <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                    	 <div class="modal-body">
      	<form action="{{url('admin/edit_new_category')}}" class="database_operation">
      		@csrf
      	<div class="row">
      		<div class="col-sm-12">
      			<div class="form-group">
      				<label>Category Name</label>
      				<input type="hidden" name="id" value="{{$category->id}}">
      				<input type="text" name="name" value="{{$category->name}}" placeholder="Enter category name" class="form-control" required>
      				

      			</div>
      			
      		</div>
      		<div class="col-sm-12">
      			<div class="form-group">
      	
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
    </div>
       
      </div>

      	</div>
      </form>
        
      </div>



  </div>
</div>



  @endsection