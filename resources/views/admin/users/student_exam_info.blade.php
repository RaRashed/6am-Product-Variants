@extends('admin.layouts.portal_master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            
                            
                        </ul>
                    </div>
                </div>




                  <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                       <h2 class="text-center">  {{$exam_info->title}} </h2>
                       <h3 class="text-center">{{date('d M Y', strtotime($exam_info->exam_date))}}</h3>
                         <div class="modal-body">
        <form action="{{route('portal.student_info_edit')}}" class="database_operation">
            @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Enter Name</label>
                    <input type="hidden" name="id" value="{{$student_info[0]['id']}}" >
                    
                    <input type="text" name="name" placeholder="Enter name" value="{{$student_info[0]['name']}}" class="form-control" required>
                    

                </div>
              <div class="form-group">
                    <label>Enter Email</label>
                    
                    <input type="email" name="email" value="{{$student_info[0]['email']}}" placeholder="Enter E Mail" class="form-control" required>
                    

                </div>
                   <div class="form-group">
                    <label>Enter Mobile No</label>
                    
                    <input type="text" name="mobile_no" placeholder="Enter Mobile No" value="{{$student_info[0]['mobile_no']}}" class="form-control" required>
                    

                </div>
                  <div class="form-group">
                    <label>Select DOB</label>
                    
                    <input type="date" name="dob" placeholder="Enter Birth Date" value="{{$student_info[0]['dob']}}" class="form-control" required>
                    

                </div>

                <div class="form-group">
              <label>Password</label>
            
              <input type="password" name="password" value="" placeholder="Enter Password" class="form-control" required>
              

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