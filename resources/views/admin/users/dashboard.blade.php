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

                @foreach($exams as $key => $exam)
                <?php
                $val=$key+1;
                if(strtotime(date('Y-m-d'))>strtotime($exam['exam_date']))
                {
                    $cls ="bg-danger";
                }


            else
            {
                    if($val%2==0)
                $cls="bg-lighter-1";
              else
                $cls="bg-info";
            }

                ?>

                <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 <?php echo $cls; ?> color-light">
                           
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"> Exam: {{$exam['title']}}</i> </h1>
                                    <h4 class="subtitle color-darker-1">Category: {{$exam['$cat_name']}}</h4>
                                </div>
                                @if(strtotime(date('Y-m-d'))< strtotime($exam['exam_date']))
                                <a href="{{route('portal.exam_form',$exam['id'])}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>More info</a>
                                @endif
                              
                            
                        </div>
                    </div>
                    @endforeach






  @endsection