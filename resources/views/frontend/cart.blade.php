@extends('frontend.layouts.frontend_master')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>



    @endif
    @if ($message = Session::get('fail'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif

@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">product_price</th>

            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['product_price'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            @foreach ($products as $product )
                            @if($product->id == $id)
                            @foreach($product->productimages as $index => $img)
                            @if($index>0 ?'active' : '')
                            <img class="img-fluid hide" src="{{asset('storage/'.$img->prod_image)}}" width="150px" height="100px" alt="">
                            @else
                            <img class="img-fluid" src="{{asset('storage/'.$img->prod_image)}}" width="150px" height="100px" alt="">

                            @endif



                            @endforeach
                            @endif

                            @endforeach

                          <!-- <div class="col-sm-3 hidden-xs"><img src="{{-- $details['prod_image'] --}}" width="100" height="100" class="img-responsive"/></div> -->
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="product_price">${{ $details['product_price'] }}</td>

                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['product_price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">

                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/frontend') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>
                total
                @if($coupon = Session::get('coupon'))

                @if($coupon['validity'] >= Carbon\Carbon::now()->format('Y-m-d'))
                 {{ $total - $coupon['discount'] }}

                 @else
                 {{ $total }}



             @endif



                @else

                {{ $total }}
                @endif





            </strong></td>
            <td><a href="{{ url('/checkout') }}" class="btn btn-warning"> Check Out <i class="fa fa-angle-right"></i></a></td>
        </tr>

        </tfoot>
    </table>
   <form action="{{ route('addcoupon')}}" method="POST">
    @csrf

    <label for=""><strong>Coupon Code</strong></label>
    <input type="text" name="coupon" required>
    <button type="submit" class="btn btn-primary">Apply</button>
   </form>

@endsection
@section('styles')
<style>
    .hide{
        display: none;
    }
</style>
@endsection
@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "post",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "post",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection
