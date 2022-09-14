@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('admin.manage_portal')}}">Portal Edit</a></li>
                            
                        </ul>
                    </div>
                </div>




   <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                       <div class="modal-body">

                        <form action="{{route('admin.edit_new_portal')}}" class="database_operation">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input type="hidden" name="id" value="{{$portal->id}}">
              <label>Portal Name</label>
              <input type="text" name="name" value="{{$portal->name}}" placeholder="Enter Student name" class="form-control" required>
              

            </div>
              <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" value="{{$portal->email}}" placeholder="Enter E-Mail" class="form-control" required>
              

            </div>
               <div class="form-group">
              <label>Mobile No</label>
              <input type="text" name="mobile_no" value="{{$portal->mobile_no}}" placeholder="Enter Mobile Number" class="form-control" required>
              

            </div>
               <div class="form-group">
              <label>Password</label>
              <input type="password" name="password"  placeholder="Enter Password" class="form-control" required>
              

            </div>
            
          </div>
          <div class="col-sm-12">
            <div class="form-group">
        
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Update Portal</button>
    </div>
       
      </div>

        </div>
      </form>
    </div>
  </div>
</div>


                    


  @endsection