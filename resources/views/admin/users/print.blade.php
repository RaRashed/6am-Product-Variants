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


              <div class="col-sm-12 col-md-8 col-md-offset-3">
                    <h4 class="text-center"><b>{{$exam->title}}</b></h4>
                    <h5 class="text-center">{{date('d M Y',strtotime($exam->exam_date))}}</h5>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="inline-validation" class="form-horizontal form-stripe" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">Name : <span class="required" aria-required="true">{{$student_info->name}}</span></label>
                                         
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="col-sm-3 control-label">Email : <span class="required" aria-required="true">{{$student_info->email}}</span></label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Phone:<span class="required" aria-required="true">{{$student_info->mobile_no}}</span></label>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Birth Date: <span class="required" aria-required="true">{{date('d M Y',strtotime($student_info->dob))}}</span></label>
                                           
                                           
                                        </div>
                                     
                               
                                    </form>
                                     <div class="form-group">
                            <button onclick="window.print()" class="btn btn-primary">Print</button>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                







  @endsection