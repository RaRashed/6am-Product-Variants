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
                        
                    <div class="panel">
                       <div class="modal-body">
        <form action="{{route('question.new_update')}}" class="database_operation">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Question</label>
              <input type="hidden" name="id" value="{{$question->id}}">

              <input type="text" name="question" placeholder="Enter Question" value="{{$question->question}}" class="form-control" required>
              

            </div>
            <?php 
            $options = json_decode($question->options);

             ?>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 1</label>
              <input type="text" name="option1" placeholder="Enter Option 1" value="{{$options->option1}}" class="form-control" required>
              

            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 2</label>
              <input type="text" name="option2" placeholder="Enter Option 2 " value="{{$options->option2}}" class="form-control" required>
              

            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 3</label>
              <input type="text" name="option3" value="{{$options->option3}}" placeholder="Enter Option 3" class="form-control" required>
              

            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Enter Option 4</label>
              <input type="text" name="option4" value="{{$options->option4}}" placeholder="Enter Option 4" class="form-control" required>
              

            </div>
          </div>
            <div class="col-sm-12">
              <div class="form-group">
              <label>Enter Rght Answer</label>
              <input type="text" name="ans" value="{{$question->ans}}" placeholder="Right Answer" class="form-control" required>
              

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


     



@endsection