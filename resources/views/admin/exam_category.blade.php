@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('admin.exam_category')}}">Category</a></li>
                            
                        </ul>
                    </div>
                </div>
                  <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                          <h4 class="section-subtitle"><b>Books</b></h4>
                          <div>
                          <a data-toggle="modal" data-target="#myModal"  class="btn btn-primary" href="javascripts:;">Addnew</a>
                          </div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        	

                        		<thead>
                        			<th>id</th>
                        			<th>Category</th>
                              <th>Status</th>
                              <th>Action</th>
                        		</thead>


                        		<tbody>
                              @foreach($category as $key => $cat)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$cat['name']}}</td>

                                <td><input class="category_status" data-id="{{$cat['id']}}" <?php if($cat['status']==1) {echo 'checked';} ?> type="checkbox" name="status"></td>
                                <td>
                                  <a href="{{route('category.edit',$cat['id'])}}" class="btn btn-primary">Edit</a>
                                  <a href="{{route('category.delete',$cat['id'])}}" class="btn btn-danger">delete</a>
                                </td>
                              </tr>
                        		
                        	
                        	@endforeach
                        		</tbody>



                        		<tfoot>
                        			<th>id</th>
                        			<th>Category</th>
                              <th>Status</th>
                              <th>Action</th>
                        		</tfoot>
                        	</table>



                    </div>
                </div>
            </div>
        </div>



<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{route('admin.new_category')}}" class="database_operation">
      		@csrf
      	<div class="row">
      		<div class="col-sm-12">
      			<div class="form-group">
      				<label>Category Name</label>
      				<input type="text" name="name" placeholder="Enter category name" class="form-control" required>
      				

      			</div>
      			
      		</div>
      		<div class="col-sm-12">
      			<div class="form-group">
      	
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Add</button>
    </div>
       
      </div>

      	</div>
      </form>
        
      </div>

      
    </div>
  </div>
</div>


    </div>

     



@endsection