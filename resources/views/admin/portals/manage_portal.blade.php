@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                   
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="">Manage Portal</a></li>
                            
                        </ul>
                    </div>
                </div>






                <div class="row animated fadeInUp">
                    <div class="">
                          <h4 class="section-subtitle"><b>Portals</b></h4>
                          <div>
                          <a data-toggle="modal" data-target="#myModal"  class="btn btn-primary" href="javascripts:;">Addnew</a>
                          </div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                          

                            <thead>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
                              <th>Status</th>
                              <th>Action</th>
                            </thead>


                            <tbody>

                                @foreach($portals as $key => $portal)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$portal['name']}}</td>
                                <td>{{$portal['email']}}</td>
                                <td>{{$portal['mobile_no']}}</td>

                                <td><input class="portal_status" data-id="{{$portal['id']}}" <?php if($portal['status']==1) {echo 'checked';} ?> type="checkbox" name="status"></td>
                                <td>

                                  <a href="{{route('portal.edit',$portal['id'])}}" class="btn btn-primary"><i class=" fa fa-edit"></i></a>
                                       
                                  
                                 
                              <a href="{{route('portal.delete',$portal['id'])}}" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
                                </td>
                              </tr>
                            
                          
                          @endforeach
                              

                             
               
                            </tbody>



                            <tfoot>
                                   <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
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
        <h5 class="modal-title">Add new Portal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.new_portal')}}" class="database_operation">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
              

            </div>
              <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" placeholder="Enter E-Mail" class="form-control" required>
              

            </div>
               <div class="form-group">
              <label>Mobile No</label>
              <input type="text" name="mobile_no" placeholder="Enter Mobile Number" class="form-control" required>
              

            </div>
                <div class="form-group">
              <label>Password</label>
          <input type="password" name="password" class="form-control" required>
              

            </div>

            
          </div>
          <div class="col-sm-12">
            <div class="form-group">
        
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Add Portal</button>
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