<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
    6am Ecommerce
  </title>
@include('frontend.partials.style')
@yield('styles')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('frontend.partials.nav')
    <!-- end header section -->
    <!-- slider section -->



    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    @yield('content')
  </section>

  <!-- end shop section -->

  <!-- saving section -->



  <!-- end saving section -->

  <!-- why section -->
  @include('frontend.partials.why_section')



  <!-- end why section -->



  <!-- gift section -->




  <!-- end gift section -->


  <!-- contact section -->



  <!-- end contact section -->

  <!-- client section -->
   <!-- testimonial -->

  <!-- end client section -->

  <!-- info section -->
@include('frontend.partials.footer')

  <!-- end info section -->


  @include('frontend.partials.scripts')
  @yield('scripts')

</body>

</html>
