
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->
<head>
  <script type="text/javascript">
    BASE_URL ="{{url('')}}";
  </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>6am Ecommerce</title>
    @include('admin.partials.styles')



</head>

<body>
    <div class="wrap">

           @include('admin.partials.navbar')

        <div class="page-body">

               @include('admin.partials.left-sidebar')

           <div class="content">
           	@yield('content')

           </div>



        </div>
    </div>


  	@include('admin.partials.scripts')
</body>



</html>











