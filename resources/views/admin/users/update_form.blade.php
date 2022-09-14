@extends('admin.layouts.portal_master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="{{route('portal.update_form')}}">Update Form</a></li>
                            
                            
                        </ul>
                    </div>
                </div>

                 <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                      <h3 class="text-center">Update Form</h3>
                         <div class="modal-body">
        <form action="{{route('portal.student_exam_info')}}" method="get">
            @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Enter Mobile Number</label>
                    <input type="hidden" name="id" value="">
                    
                    <input type="text" name="mobile_no" placeholder="Enter MObile number" class="form-control" required>
                    

                </div>
              
                                  <div class="form-group">
                    <label>Select DOB</label>
                    
                    <input type="date" name="dob" placeholder="Enter Birth Date" class="form-control" required>
                    

                </div>

                <div class="form-group">
                    <label>Select Exam</label>
                    
                    <select class="form-control" name="exam">
                        <option value="">select</option>
                        @foreach($exams as $exam)
                        <option value="{{$exam['id']}}">{{$exam['title']}}</option>
                        @endforeach
                    </select>
                    

                </div>


                
            </div>
            <div class="col-sm-12">
                <div class="form-group">
        
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Search</button>
    </div>
       
      </div>

        </div>
      </form>
        
      </div>



  </div>
</div>


           




                







  @endsection