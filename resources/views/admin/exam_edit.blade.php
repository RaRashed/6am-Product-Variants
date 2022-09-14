@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('admin.manage_exam')}}">Category Edit</a></li>
                            
                        </ul>
                    </div>
                </div>



                     <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                    	 <div class="modal-body">
      	<form action="{{url('admin/edit_new_exam')}}" class="database_operation">
      		@csrf
      	<div class="row">
      		<div class="col-sm-12">
      			<div class="form-group">
      				<label>Category Name</label>
      				<input type="hidden" name="id" value="{{$exam->id}}">
      				<input type="text" name="title" value="{{$exam->title}}" placeholder="Enter category name" class="form-control" required>
      				

      			</div>
                <div class="form-group">
              <label>Exam Category Name</label>
             <select class="form-control" name="category">
                <option  value="">Select</option>
                @foreach($category as $cat)
                <option <?php if ($exam->category==$cat['id']){ echo 'selected';}?> value="{{$cat['id']}}">{{$cat['name']}}</option>
                @endforeach
              </select>
              

            </div>
                <div class="form-group">
              <label>Exam Date</label>
            
              <input type="date" name="exam_date" value="{{$exam->exam_date}}" placeholder="Enter category name" class="form-control" required>
              

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