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

                        <form method="get">
          
        <div class="row">
          <div class="col-sm-12">

            <table class="table table-bordered">
         <tr>
           <th>Student Name</th>
           <td>{{$student['name']}}</td>
         </tr>
          <tr>
           <th>Student Email</th>
           <td>{{$student['email']}}</td>
         </tr>
          <tr>
           <th>Student Phone No</th>
           <td>{{$student['mobile_no']}}</td>
         </tr>
          <tr>
           <th>Student Birth Date</th>
           <td>{{$student['dob']}}</td>
         </tr>
          <tr>
                
         </table>
           
            
          </div>
  

        </div>
      </form>
    </div>
  </div>
</div>


                    


  @endsection