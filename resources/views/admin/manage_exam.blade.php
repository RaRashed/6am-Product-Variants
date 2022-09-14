@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('admin.manage_exam')}}">Manage Exam</a></li>
                            
                        </ul>
                    </div>
                </div>
                  <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
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
                              <th>Title</th>
                              <th>Category</th>
                              <th>Exam Date</th>
                              <th>Status</th>
                              <th>Action</th>
                            </thead>


                            <tbody>

                              @foreach($exams as $key => $exam)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$exam['title']}}</td>
                                <td>{{$exam['cat_name']}}</td>
                                <td>{{$exam['exam_date']}}</td>

                                <td><input class="exam_status" data-id="{{$exam['id']}}" <?php if($exam['status']==1) {echo 'checked';} ?> type="checkbox" name="status"></td>
                                <td>
                                  <a href="{{route('exam.edit', $exam['id'])}}" class="btn btn-info">Edit</a>
                              <a href="{{route('exam.delete',$exam['id'])}}" class="btn btn-danger">delete</a>
                              <a href="{{route('exam.question',$exam['id'])}}" class="btn btn-primary">Add Question</a>
                                </td>
                              </tr>
                            
                          
                          @endforeach
               
                            </tbody>



                            <tfoot>
                              <th>#</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Exam Date</th>
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
        <form action="{{route('admin.new_exam')}}" class="database_operation">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Exam Title</label>
              <input type="text" name="title" placeholder="Enter Exam Title" class="form-control" required>
              

            </div>
                <div class="form-group">
              <label>Select Exam Category</label>
              <select class="form-control" name="category">
                <option value="">Select</option>
                @foreach($category as $cat)
                <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                @endforeach
              </select>
              

            </div>
                  <div class="form-group">
                 <label>Select Exam date</label>
                 <input type="date" name="exam_date" placeholder="Enter Exam date" class="form-control" required>
              

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