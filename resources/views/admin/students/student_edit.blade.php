@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('admin.manage_student')}}">Student Edit</a></li>
                            
                        </ul>
                    </div>
                </div>




   <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                       <div class="modal-body">

                        <form action="{{route('admin.edit_new_student')}}" class="database_operation">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input type="hidden" name="id" value="{{$student->id}}">
              <input type="text" name="name" value="{{$student->name}}" placeholder="Enter Student name" class="form-control" required>
              

            </div>
              <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" value="{{$student->email}}" placeholder="Enter E-Mail" class="form-control" required>
              

            </div>
               <div class="form-group">
              <label>Mobile No</label>
              <input type="text" name="mobile_no" value="{{$student->mobile_no}}" placeholder="Enter Mobile Number" class="form-control" required>
              

            </div>
                <div class="form-group">
              <label>Select DOB</label>
          <input type="date" name="dob" value="{{$student->dob}}" class="form-control" required>
              

            </div>

             <div class="form-group">
                 <label>Select Exam</label>
              <select class="form-control" name="exam" required>
                <option value="">Select</option>
                
                  @foreach($exams as $exam)
                  <option <?php if($student->exam==$exam['id']) {echo 'selected';} ?> value="{{$exam['id']}}">{{$exam['title']}}</option>

                  @endforeach
              
              </select>
              

            </div>
               <div class="form-group">
              <label>Password</label>
              <input type="password" name="password"  placeholder="Enter Password" class="form-control" required>
              

            </div>
            
          </div>
          <div class="col-sm-12">
            <div class="form-group">
        
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Update Student</button>
    </div>
       
      </div>

        </div>
      </form>
    </div>
  </div>
</div>


                    


  @endsection