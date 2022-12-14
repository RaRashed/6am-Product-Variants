@php

@endphp


<div class="d-flex flex-row" style="max-height: 300px; overflow-y: scroll;">
    <table class="table table-bordered">
        <thead class="text-muted">
            <tr>
                <th scope="col">item</th>
                <th scope="col" class="text-center">qty</th>
                <th scope="col">price</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $subtotal = 0;
            $addon_price = 0;
            $tax = 0;
            $discount = 0;
            $discount_type = 'amount';
            $discount_on_product = 0;
            $total_tax = 0;
            $ext_discount = 0;
            $ext_discount_type = 'amount';
            $coupon_discount =0;
        ?>
        @if(session()->has($cart_id) && count( session()->get($cart_id)) > 0)

            @foreach(session()->get($cart_id) as $key => $cartItem)
            @if(is_array($cartItem))
                <?php

                $product_subtotal = ($cartItem['price'])*$cartItem['quantity'];

                // $discount_on_product += ($cartItem['discount']*$cartItem['quantity']);
                $subtotal += $product_subtotal;


                //tax calculation
                $product = \App\Models\Product::find($cartItem['id']);
                // $total_tax += \App\CPU\Helpers::tax_calculation($cartItem['price'], $product['tax'], $product['tax_type'])*$cartItem['quantity'];

                ?>

            <tr>
                <td class="media align-items-center">
                    {{-- <img class="avatar avatar-sm mr-1" src="{{asset('storage/app/public/product/thumbnail')}}/{{$cartItem['image']}}"
                            onerror="this.src='{{asset('public/assets/back-end/img/160x160/img2.jpg')}}'" alt="{{$cartItem['name']}} image"> --}}
                    <div class="media-body">
                        <h5 class="text-hover-primary mb-0">{{Str::limit($cartItem['name'], 10)}}</h5>
                        <small>{{Str::limit($cartItem['variant'], 20)}}</small>

                    </div>
                </td>
                <td class="align-items-center text-center">
                    <input type="number"  data-key="{{$key}}" style="width:50px;text-align: center;" value="{{$cartItem['quantity']}}" min="1" onkeyup="updateQuantity('{{$cartItem['id']}}',this.value,event)">
                </td>
                <td class="text-center px-0 py-1">
                    <div class="btn">
                        {{$product_subtotal}}
                    </div> <!-- price-wrap .// -->
                </td>
                <td class="align-items-center text-center">
                    <a href="javascript:removeFromCart({{$key}})" class="btn btn-sm btn-outline-danger"> <i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endif
            @endforeach
        @endif
        </tbody>
    </table>
</div>

<?php
    $total = $subtotal;
    $discount_amount = $discount_on_product;
    $total -= $discount_amount;

    $extra_discount = $ext_discount;
    $extra_discount_type = $ext_discount_type;
    if($extra_discount_type == 'percent' && $extra_discount > 0){
        $extra_discount =  (($subtotal)*$extra_discount) / 100;
    }
    if($extra_discount) {
        $total -= $extra_discount;
    }

    $total_tax_amount= $total_tax;

?>
<div class="box p-3">
    <dl class="row text-sm-right">

        <div class="col-12 d-flex justify-content-between">
            <dt  class="col-sm-6">sub_total : </dt>
            <dd class="col-sm-6 text-right">{{$subtotal}}</dd>

        </div>

        {{-- <div class="col-12 d-flex justify-content-between">
            <dt  class="col-sm-6">discount:</dt>
            <dd class="col-sm-6 text-right">{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($discount_amount,2))) }}</dd>
        </div> --}}
{{--
        <div class="col-12 d-flex justify-content-between">
            <dt  class="col-sm-6">{{\App\CPU\translate('extra')}} {{\App\CPU\translate('discount')}} :</dt>
            <dd class="col-sm-6 text-right">
                <button id="extra_discount" class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-discount">
                    <i class="tio-edit"></i></button>
                {{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($extra_discount))}}
            </dd>
        </div> --}}

        {{-- <div class="col-12 d-flex justify-content-between">
            <dt  class="col-sm-6">coupon discount :</dt>
            <dd class="col-sm-6 text-right">
                <button id="coupon_discount" class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-coupon-discount">
                    <i class="fa fa-edit"></i>
                </button>
                {{$coupon_discount}}
            </dd>
        </div> --}}
{{--
        <div class="col-12 d-flex justify-content-between">
            <dt  class="col-sm-6">{{\App\CPU\translate('tax')}} : </dt>
            <dd class="col-sm-6 text-right">{{$total_tax_amount,2}}</dd>
        </div> --}}
     <div class="col-12 d-flex justify-content-between">
            <dt  class="col-sm-6">total : </dt>
            <dd class="col-sm-6 text-right h4 b">{{$total-$coupon_discount}}</dd>
        </div>
    </dl>
    <div class="row">
        <div class="col-md-6 mb-2">
            <a href="#" class="btn btn-danger btn-lg btn-block" onclick="emptyCart()"><i
                    class="fa fa-times-circle "></i> Cancel </a>
        </div>
        <div class="col-md-6">

            <a href="{{ url('/example1') }}" class="btn btn-primary btn-lg btn-block">Pay Now SSl</a>
            <a href="{{ url('/stripe-payment') }}" class="btn btn-primary btn-lg btn-block">Pay Now Stripe</a>
            <a href="{{ url('/paystack') }}" class="btn btn-primary btn-lg btn-block">Pay Now stack</a>
            {{-- <button class="your-button-class" id="sslczPayBtn"
        token="if you have any token validation"
        postdata="your javascript arrays or objects which requires in backend"
        order="If you already have the transaction generated for current order"
        endpoint="/pay-via-ajax"> Pay Now SSl
</button> --}}
            {{-- <a href="{{ url('transaction') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-shopping-bag"></i>paypal</a> --}}
            {{-- <button id="submit_order" type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-shopping-bag"></i>
                Order</button> --}}
         {{-- <form action="{{ route('cart.add') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg btn-block" ><i class="fa fa-shopping-bag"></i>
                Order</button>
         </form> --}}
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="add-discount" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{\App\CPU\translate('update_discount')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">{{\App\CPU\translate('discount')}}</label>
                        <input type="number" id="dis_amount" class="form-control" name="discount">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">{{\App\CPU\translate('type')}}</label>
                        <select name="type" id="type_ext_dis" class="form-control">
                            <option value="amount" {{$discount_type=='amount'?'selected':''}}>{{\App\CPU\translate('amount')}}()</option>
                            <option value="percent" {{$discount_type=='percent'?'selected':''}}>{{\App\CPU\translate('percent')}}(%)</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <button class="btn btn-primary" onclick="extra_discount();" type="submit">{{\App\CPU\translate('submit')}}</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="add-coupon-discount" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">coupon_discount</h5>
                <button id="coupon_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="form-group col-sm-12">
                        <label for="">coupon code</label>
                        <input type="text" id="coupon_code" class="form-control" name="coupon_code">
                        {{-- <input type="hidden" id="user_id" name="user_id" > --}}
                    </div>

                    <div class="form-group col-sm-12">
                        <button class="btn btn-primary" type="submit" onclick="coupon_discount();">submit</button>
                    </div>

            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="add-tax" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{\App\CPU\translate('update_tax')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.pos.tax')}}" method="POST" class="row">
                    @csrf
                    <div class="form-group col-12">
                        <label for="">{{\App\CPU\translate('tax')}} (%)</label>
                        <input type="number" class="form-control" name="tax" min="0">
                    </div>

                    <div class="form-group col-sm-12">
                        <button class="btn btn-primary" type="submit">{{\App\CPU\translate('submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">payment</h5>
                <button id="payment_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('processTransaction') }}" id='order_place' method="get" class="row">
                    @csrf
                    <div class="form-group col-12">
                        <label class="input-label" for="">amount</label>
                        <input type="number" class="form-control" name="amount" min="0" step="0.01"
                                value="{{$total}}"
                                readonly>
                    </div>
                    {{-- <div class="form-group col-12">
                        <label class="input-label" for="">type</label>
                        <select name="type" class="form-control">
                            <option value="cash">cash</option>
                            <option value="card">card'</option>
                        </select>
                    </div> --}}
                    <div class="form-group col-12">
                        <button class="btn btn-primary"type="submit">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--

<div class="modal fade" id="short-cut-keys" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{\App\CPU\translate('short_cut_keys')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>{{\App\CPU\translate('to_click_order')}} : alt + O</span><br>
                <span>{{\App\CPU\translate('to_click_payment_submit')}} : alt + S</span><br>
                <span>{{\App\CPU\translate('to_close_payment_submit')}} : alt + Z</span><br>
                <span>{{\App\CPU\translate('to_click_cancel_cart_item_all')}} : alt + C</span><br>
                <span>{{\App\CPU\translate('to_click_add_new_customer')}} : alt + A</span> <br>
                <span>{{\App\CPU\translate('to_submit_add_new_customer_form')}} : alt + N</span><br>
                <span>{{\App\CPU\translate('to_click_short_cut_keys')}} : alt + K</span><br>
                <span>{{\App\CPU\translate('to_print_invoice')}} : alt + P</span> <br>
                <span>{{\App\CPU\translate('to_cancel_invoice')}} : alt + B</span> <br>
                <span>{{\App\CPU\translate('to_focus_search_input')}} : alt + Q</span> <br>
                <span>{{\App\CPU\translate('to_click_extra_discount')}} : alt + E</span> <br>
                <span>{{\App\CPU\translate('to_click_coupon_discount')}} : alt + D</span> <br>
                <span>{{\App\CPU\translate('to_click_clear_cart')}} : alt + X</span> <br>
                <span>{{\App\CPU\translate('to_click_new_order')}} : alt + R</span> <br>

            </div>
        </div>
    </div>
</div> --}}

