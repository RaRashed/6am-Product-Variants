@extends('admin.layouts.master')

@section('content')

<div class="content-header">

                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="">Manage Student</a></li>

                        </ul>
                    </div>
                </div>






                <div class="row animated fadeInUp">
                    <div class="">
                          <h4 class="section-subtitle"><b>Exams</b></h4>
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
                              <th>DOB</th>
                              <th>Exam name</th>
                              <th>Exam Date</th>
                              <th>Result</th>
                              <th>Status</th>
                              <th>Action</th>
                            </thead>


                            <tbody>
                               @foreach($students as $key => $student)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$student['name']}}</td>
                                <td>{{$student['email']}}</td>
                                <td>{{$student['mobile_no']}}</td>
                                <td>{{$student['dob']}}</td>
                                <td>{{$student['ex_name']}}</td>
                                <td>{{$student['exam_date']}}</td>

                           <td>



                                    @foreach($exam_join as $join)


                                       <?php

                                if($student['id']==$join['user_id'])
                                {
                                  echo $join['yes_ans'].'/'.($join['yes_ans']+$join['no_ans']);
                                }

                                 ?>


                                @endforeach





                           </td>

                                <td><input class="student_status" data-id="{{$student['id']}}" <?php if($student['status']==1) {echo 'checked';} ?> type="checkbox" name="status"></td>
                                <td>

                                  <a href="{{route('student.edit',$student['id'])}}" class="btn btn-primary"><i class=" fa fa-edit"></i></a>
                                        <a href="{{route('student.show',$student['id'])}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>


                              <a href="{{route('student.delete',$student['id'])}}" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
                                </td>
                              </tr>


                          @endforeach



                            </tbody>



                            <tfoot>
                               <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
                              <th>DOB</th>
                              <th>Exam name</th>
                              <th>Exam Date</th>
                              <th>Result</th>
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
        <h5 class="modal-title">Add new Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.new_student')}}" class="database_operation">
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
              <label>Select DOB</label>
          <input type="date" name="dob" class="form-control" required>


            </div>

                  <div class="form-group">
                 <label>Select Exam</label>
              <select class="form-control" name="exam" required>
                <option value="">Select</option>

                  @foreach($exams as $exam)
                  <option value="{{$exam['id']}}">{{$exam['title']}}</option>

                  @endforeach

              </select>


            </div>
               <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter Password" class="form-control" required>


            </div>

          </div>
          <div class="col-sm-12">
            <div class="form-group">

        <button class="btn btn-primary" ><i class="fa fa-save"></i> Add Student</button>
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
