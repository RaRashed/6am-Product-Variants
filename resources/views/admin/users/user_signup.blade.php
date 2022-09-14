
<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Registration</title>
   @include('admin.partials.styles')
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
         <img alt="logo" width="100" height="100" src="{{asset('assets/images/rashed.jpg')}}" />                                                            
            




                 
        </div>
 
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                   <form action="{{route('portal.new_user')}}" class="database_operation1">
            @csrf
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="">
                                <i class="fa fa-user"></i>
                            </span>
                                                     </div>
                         
                         
                        

                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" value="">
                                <i class="fa fa-user"></i>
                            </span>

                                                    </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>

                                                    </div>
                     
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01*********" name="mobile_no" pattern="01[3|4|5|6|7|8|9][0-9]{8}">
                                <i class="fa fa-user"></i>
                            </span>

                                                    </div>
                      
                        <div class="form-group">
                        
                       <button class="btn btn-primary btn-block">Sign Up</button>
                        
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="{{route('user.sign_in')}}">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
@include('admin.partials.scripts')
</body>


</html>

