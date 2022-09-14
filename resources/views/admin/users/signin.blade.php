
<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LOG IN</title>
  
   @include('admin.partials.styles')
</head>

<body>
<div class="wrap">
    
    <div class="page-body animated slideInDown">
       
      
        <div class="logo">
            <img alt="logo" width="100" height="100" src="{{asset('assets/images/rashed.jpg')}}" />
                     </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">

                     <form action="{{route('portal.new_user_login')}}" class="database_operation1">
                        @csrf
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Portal Sign in" class="btn btn-primary btn-block" name="login">
                            
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="{{route('user.sign_up')}}" class="btn btn-block mt-sm">Register</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>

 @include('admin.partials.scripts')

</body>


</html>

