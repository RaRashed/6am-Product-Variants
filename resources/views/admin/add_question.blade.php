@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="">Add Question</a></li>
                            
                        </ul>
                    </div>
                </div>
                  <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                          <h4 class="section-subtitle"><b>Questions</b></h4>
                          <div>
                          <a data-toggle="modal" data-target="#myModal"  class="btn btn-primary" href="javascripts:;">Addnew</a>
                          </div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        	

                        		<thead>
                        			<th>#</th>
                        			<th>Question</th>
                              <th>Answer</th>
                              <th>Status</th>
                              <th>Action</th>
                        		</thead>


                        		<tbody>
                              @foreach($questions as $key => $question)
                              <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$question['question']}}</td>
                               <td>{{$question['ans']}}</td>
                                 <td><input class="question_status" data-id="{{$question['exam_id']}}" <?php if($question['status']==1) {echo 'checked';} ?> type="checkbox" name="status"></td>
                                <td>
                                  <a href="{{route('question.update',$question['id'])}}" class="btn btn-primary">Update</a>
                                  <a href="{{route('question.delete',$question['id'])}}" class="btn btn-danger">delete</a>
                                </td>
                              </tr>
                                @endforeach
                             
                        		</tbody>



                        		<tfoot>
                        		  <th>#</th>
                              <th>Question</th>
                              <th>Answer</th>
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
        <h5 class="modal-title">Add new Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{route('exam.new_question')}}" class="database_operation">
      		@csrf
      	<div class="row">
      		<div class="col-sm-12">
      			<div class="form-group">
      				<label>Enter Question</label>
              <input type="hidden" name="exam_id" value="{{ Request::segment(4) }}">

      				<input type="text" name="question" placeholder="Enter Question" class="form-control" required>
      				

      			</div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 1</label>
              <input type="text" name="option1" placeholder="Enter Option 1" class="form-control" required>
              

            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 2</label>
              <input type="text" name="option2" placeholder="Enter Option 2 " class="form-control" required>
              

            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 3</label>
              <input type="text" name="option3" placeholder="Enter Option 3" class="form-control" required>
              

            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 4</label>
              <input type="text" name="option4" placeholder="Enter Option 4" class="form-control" required>
              

            </div>
          </div>
            <div class="col-sm-12">
              <div class="form-group">
              <label>Enter Rght Answer</label>
              <input type="text" name="ans" placeholder="Right Answer" class="form-control" required>
              

            </div>
          </div>
      			
      	
      		<div class="col-sm-12">
      			<div class="form-group">
      	
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Add</button>
    </div>
  </div>
       
    

      
      </form>
        
      </div>
    </div>

      
    </div>
  </div>
</div>


    </div>

     



@endsection