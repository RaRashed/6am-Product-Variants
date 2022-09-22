@extends('frontend.layouts.frontend_master')
@section('content')
<div class="container">
    <div class="heading_container heading_center">
      <h2>
        Latest Products
      </h2>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>



@endif

    <div class="row">

      @foreach($products as $product)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <a href="">

           @foreach ($product->productimages as $index=> $img )

                        <a href="{{asset('storage/'.$img->prod_image)}}" data-lightbox="product{{ $product->id }}">
                            @if($index > 0)
                            <img class="img-fluid hide" src="{{asset('storage/'.$img->prod_image)}}" width="150px" height="100px" alt="">
                            @else
                            <img class="img-fluid" src="{{asset('storage/'.$img->prod_image)}}" width="150px" height="100px" alt="">

                            @endif

                        </a>

                       @endforeach




            <div class="detail-box">
              <h6>
                {{ $product->name }}
              </h6>
              <h6>
                Price
                <span>
                 {{ $convert_value->symbol}} {{ $product->product_price * $convert_value->rate}}
                  {{-- {{ $product->product_price }} --}}
                </span>
              </h6>

            </div>
            <a class="new" href="{{ url('add-to-cart/'.$product->id) }}">
              <span>
                <i class="fa-solid fa-cart-shopping"></i>
              </span>
            </a>
          </a>
        </div>
      </div>

      @endforeach

    </div>
    <div class="btn-box">
      <a href="">
        View All Products
      </a>
    </div>
  </div>

@endsection
@section('styles')

<style>
    .hide{
        display: none;
    }
</style>

@endsection
@section('scripts')

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
