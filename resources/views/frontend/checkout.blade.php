

@extends('frontend.layouts.frontend_master')
@section('content')
<div class="card card-body container margin-top-20px mb-3">

<div class="card card-body">

<h2>Confirm Items</h2>
<br>
<hr>
<div class="row">
  <div class=" col-md-7">


  </div>
  <div class="col-md-5">




<p> Total Price: <strong>   Taka</strong></p>
<p> Total Price With Shipping Cost: <strong></strong></p>
  </div>
</div>

<p>
  <a href="{{route('cart')}}">Change Carts Items</a>
</p>




</div>
<div class="card card-body mt-2 mb-4">

<h2>Shipping  Address</h2>
<br>
<form method="POST" action="{{ route('checkout') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::check() ? Auth::user()->first_name. ' '.Auth::user()->last_name : '' }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>



                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                          <div class="col-md-6">
                              <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no :'' }}" required autocomplete="phone_no">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                         </div>
















                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Order Now') }}
                              </button>
                          </div>
                      </div>


                              @error('payment_method')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>


                  </form>

</p>



<p>
  <a href="{{route('cart')}}">Change Carts Items</a>
</p>




</div>

</div>

@endsection

@section('scripts')

                              <script type="text/javascript">
                                    $("#payments").change(function(){
                                  $payment_method = $("#payments").val();

                                  if ($payment_method=="rocket") {
                                      $("#payment_rocket").removeClass('hidden');
                                      $("#payment_bkash").addClass('hidden');
                                      $("#payment_nagad").addClass('hidden');

                                  }
                                  else if($payment_method=="bkash"){
                                      $("#payment_bkash").removeClass('hidden');
                                      $("#payment_rocket").addClass('hidden');
                                      $("#payment_nagad").addClass('hidden');
                                      $("#transaction_id").removeClass('hidden');


                                  }
                                  else if($payment_method=="nagad"){
                                      $("#payment_nagad").removeClass('hidden');
                                      $("#payment_bkash").addClass('hidden');
                                      $("#payment_rocket").addClass('hidden')
                                      $("#transaction_id").removeClass('hidden');;

                                  }


                          })</script>


@endsection
