<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title></title>

<link rel="shortcut icon" href="">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://6valley.6amtech.com/public/assets/back-end/css/vendor.min.css">
<link rel="stylesheet" href="https://6valley.6amtech.com/public/assets/back-end/vendor/icon-set/style.css">

<meta name="_token" content="V9jzOW25DytEFhU0W3hDDV333dNIKDXMEATx7uyE">
<link rel="stylesheet" href="https://6valley.6amtech.com/public/assets/back-end/css/theme.minc619.css?v=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
        .scroll-bar {
            max-height: calc(100vh - 100px);
            overflow-y: auto !important;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 1px #cfcfcf;
            /*border-radius: 5px;*/
        }

        ::-webkit-scrollbar {
            width: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            /*border-radius: 5px;*/
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FC6A57;
        }
        .deco-none {
            color: inherit;
            text-decoration: inherit;
        }
        .qcont{
            text-transform: lowercase;
        }
        .qcont:first-letter {
            text-transform: capitalize;
        }



        .navbar-vertical .nav-link {
            color: #ffffff;
        }

        .navbar .nav-link:hover {
            color: #C6FFC1;
        }

        .navbar .active > .nav-link, .navbar .nav-link.active, .navbar .nav-link.show, .navbar .show > .nav-link {
            color: #C6FFC1;
        }

        .navbar-vertical .active .nav-indicator-icon, .navbar-vertical .nav-link:hover .nav-indicator-icon, .navbar-vertical .show > .nav-link > .nav-indicator-icon {
            color: #C6FFC1;
        }

        .nav-subtitle {
            display: block;
            color: #fffbdf91;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .03125rem;
        }

        .navbar-vertical .navbar-nav.nav-tabs .active .nav-link, .navbar-vertical .navbar-nav.nav-tabs .active.nav-link {
            border-left-color: #C6FFC1;
        }
        .item-box{
            height:250px;
            width:150px;
            padding:3px;
        }

        .header-item{
            width:10rem;
        }
        @media  only screen and (min-width: 768px) {
            .view-web-site-info {
                display: none;
            }

        }
    </style>
<script src="https://6valley.6amtech.com/public/assets/back-end/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js"></script>
<link rel="stylesheet" href="https://6valley.6amtech.com/public/assets/back-end/css/toastr.css">
</head>
<body class="footer-offset">
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="loading" style="display: none;">
<div style="position: fixed;z-index: 9999; left: 40%;top: 37% ;width: 100%">
{{-- <img width="200" src="https://6valley.6amtech.com/public/assets/admin/img/loader.gif">  --}}
<h1>Wait i am comming</h1>
</div>
</div>
</div>
</div>
</div>

<header id="header" class="col-12 navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
<div class="navbar-nav-wrap">
<div class="navbar-brand-wrapper">
</div>

<div class="navbar-nav-wrap-content-right">










</header>
<main id="content" role="main" class="main pointer-event">
    <!-- Content -->
        <!-- ========================= SECTION CONTENT ========================= -->
        <section class="section-content padding-y-sm bg-default mt-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 card padding-y-sm ">
                        <div class="card-header">
                            <div class="row w-100 d-flex justify-content-between">
                                <div class="col-sm-6 col-md-12 col-lg-5 mb-2">
                                    <form  class="col-sm-12 col-md-12 col-lg-12">
                                        <!-- Search -->
                                        <div class="input-group-overlay input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="search" autocomplete="off" type="text" value="{{$keyword?$keyword:''}}"
                                                    name="search" class="form-control search-bar-input" placeholder="Search here"
                                                    aria-label="Search here">
                                            <diV class="card search-card w-4" style="position: absolute;z-index: 1;width: 100%;">
                                                <div id="search-box" class="card-body search-result-box" style="display: none;"></div>
                                            </diV>
                                        </div>
                                        <!-- End Search -->
                                    </form>
                                </div>
                                <div class="col-12 col-sm-6 col-md-12 col-lg-5">
                                    <div class="input-group float-right" >
                                        <select name="category" id="category" class="form-control js-select2-custom mx-1" title="select category" onchange="set_category_filter(this.value)">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $item)
                                            <option value="{{$item->id}}" {{$category==$item->id?'selected':''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body" id="items">
                            <div class="d-flex flex-wrap mt-2 mb-3" style="justify-content: space-around;">
                                @foreach($products as $product)
                                    <div class="item-box">
                                        @include('admin.pos.single_product',['product'=>$product])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12" style="overflow-x: scroll;">
                                    {{-- {!!$products->withQueryString()->links()!!} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 padding-y-sm mt-2">
                        <div class="card pr-1 pl-1">

                                <div class="row mt-2">
                                    <div class="form-group mt-1 col-12 w-i6">
                                    <select onchange="customer_change(this.value);" id='customer' name="customer_id" data-placeholder="Walk In Customer" class="js-data-example-ajax form-control">
                                        <option value="0">walking_customer</option>
                                    </select>
                                    {{-- <button class="btn btn-sm btn-white btn-outline-primary ml-1" type="button" title="Add Customer">
                                        <i class="tio-add-circle text-dark"></i>
                                    </button> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-1 col-12 col-lg-6 mb-0">
                                        <button class="w-100 d-inline-block btn btn-success rounded" id="add_new_customer" type="button" data-toggle="modal" data-target="#add-customer" title="Add Customer">
                                           <i class="tio-add-circle-outlined"></i> customer
                                        </button>
                                    </div>
                                    <div class="form-group mt-1 col-12 col-lg-6 mb-0">
                                        <a class="w-100 d-inline-block btn btn-warning rounded" onclick="new_order()">
                                           new_order
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-12 mb-0">
                                        <label class="input-label text-capitalize border p-1" >Current Customer : <span class="style-i4 mb-0 p-1" id="current_customer"></span></label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="form-group mt-1 col-12 col-lg-6 mt-2 mb-0">
                                        <select id='cart_id' name="cart_id"
                                                class=" form-control js-select2-custom" onchange="cart_change(this.value);">
                                        </select>
                                    </div>

                                    <div class="form-group mt-1 col-12 col-lg-6 mt-2 mb-0">
                                        <a class="w-100 d-inline-block btn btn-danger rounded" onclick="clear_cart()">
                                            clear_cart
                                        </a>
                                    </div>
                                </div>

                            <div class='w-100' id="cart">
                                @include('admin.pos.add_cart',['cart_id'=>$cart_id])
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- container //  -->
        </section>

        <!-- End Content -->
        <div class="modal fade" id="quick-view" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" id="quick-view-modal">

                </div>
            </div>
        </div>

        {{-- @php($order=\App\Model\Order::find(session('last_order')))
        @if($order)
        @php(session(['last_order'=> false]))
        <div class="modal fade" id="print-invoice" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{\App\CPU\translate('Print Invoice')}}</h5>
                        <button id="invoice_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row" style="font-family: emoji;">
                        <div class="col-md-12">
                            <center>
                                <input id="print_invoice" type="button" class="btn btn-primary non-printable" onclick="printDiv('printableArea')"
                                    value="Proceed, If thermal printer is ready."/>
                                <a href="{{url()->previous()}}" class="btn btn-danger non-printable">{{\App\CPU\translate('Back')}}</a>
                            </center>
                            <hr class="non-printable">
                        </div>
                        <div class="row" id="printableArea" style="margin: auto;">
                            @include('admin-views.pos.order.invoice')
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif --}}

        <div class="modal fade" id="add-customer" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">add_new_customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new_customer') }}" method="post" id="product_form"
                              >
                            @csrf
                                <div class="row pl-2" >
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label" >Name <span
                                                    class="input-label-secondary text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"  placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label" >Emil <span
                                                    class="input-label-secondary text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" value="{{ old('email') }}"  placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-2" >

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label" >phone<span
                                                class="input-label-secondary text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"  placeholder="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label">address <span
                                                class="input-label-secondary text-danger">*</span></label>
                                            <input type="text"  name="address" class="form-control" value="{{ old('address') }}"  placeholder="address" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row pl-2" >

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label">city <span
                                                class="input-label-secondary text-danger">*</span></label>
                                            <input type="text"  name="city" class="form-control" value="{{ old('city') }}"  placeholder="city" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label">zip code <span
                                                class="input-label-secondary text-danger">*</span></label>
                                            <input type="text"  name="zip_code" class="form-control" value="{{ old('zip_code') }}"  placeholder="zip code" required>
                                        </div>
                                    </div>

                                </div>

                            <hr>
                            <button type="submit" id="submit_new_customer" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
    <!-- JS Implementing Plugins -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="https://6valley.6amtech.com/public/assets/back-end/js/vendor.min.js"></script>
<script src="https://6valley.6amtech.com/public/assets/back-end/js/theme.min.js"></script>
<script src="https://6valley.6amtech.com/public/assets/back-end/js/sweet_alert.js"></script>
<script src="https://6valley.6amtech.com/public/assets/back-end/js/toastr.js"></script>
<script type="text/javascript"></script>
<script>
    function openInfoWeb()
    {
        var x = document.getElementById("website_info");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>

        function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
        }

    $(document).on('ready', function () {
        // INITIALIZATION OF UNFOLD
        // =======================================================
        $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
        });
        $.ajax({
            url: '{{route('get_cart_id')}}',
            type: 'GET',

            dataType: 'json', // added data type
            beforeSend: function () {
                $('#loading').removeClass('d-none');
                //console.log("loding");
            },
            success: function (data) {
               console.log(data);
                var output = '';
                    for(var i=0; i<data.cart_nam.length; i++) {
                        output += `<option value="${data.cart_nam[i]}" ${data.current_user==data.cart_nam[i]?'selected':''}>${data.cart_nam[i]}</option>`;
                    }
                    $('#cart_id').html(output);
                    $('#current_customer').text(data.current_customer);
                    $('#cart').empty().html(data.view);

            },
            complete: function () {
                $('#loading').addClass('d-none');
            },
        });
    });
</script>
<script>
    document.addEventListener("keydown", function(event) {
    "use strict";
    if (event.altKey && event.code === "KeyO")
    {
        $('#submit_order').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyZ")
    {
        $('#payment_close').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyS")
    {
        $('#order_complete').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyC")
    {
        emptyCart();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyA")
    {
        $('#add_new_customer').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyN")
    {
        $('#submit_new_customer').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyK")
    {
        $('#short-cut').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyP")
    {
        $('#print_invoice').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyQ")
    {
        $('#search').focus();
        $("#search-box").css("display", "none");
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyE")
    {
        $("#search-box").css("display", "none");
        $('#extra_discount').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyD")
    {
        $("#search-box").css("display", "none");
        $('#coupon_discount').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyB")
    {
        $('#invoice_close').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyX")
    {
        clear_cart();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyR")
    {
        new_order();
        event.preventDefault();
    }

});
</script>

<script>
    jQuery(".search-bar-input").on('keyup',function () {
        //$('#search-box').removeClass('d-none');
        $(".search-card").removeClass('d-none').show();
        let name = $(".search-bar-input").val();
        //console.log(name);
        if (name.length >0) {
            $('#search-box').removeClass('d-none').show();
            $.ajax({
                type:'get',
                url: '{{ route('search-products') }}',
                dataType: 'json',
                data: {
                    name: name
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                   console.log(data.count);

                    $('.search-result-box').empty().html(data.result);
                    if(data.count==1)
                    {
                        $('.search-result-box').empty().hide();
                        $('#search').val('');
                        quickView(data.id);
                    }

                },
                complete: function () {
                    $('#loading').addClass('d-none');
                },
            });
        } else {
            $('.search-result-box').empty();
        }
    });
</script>
<script>
    "use strict";
    function customer_change(val) {
        //let  cart_id = $('#cart_id').val();
        $.ajax({
            type:'post',
                url: '{{route('remove-discount')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    //cart_id:cart_id,
                    user_id:val
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                   // console.log(data);

                    var output = '';
                    for(var i=0; i<data.cart_nam.length; i++) {
                        output += `<option value="${data.cart_nam[i]}" ${data.current_user==data.cart_nam[i]?'selected':''}>${data.cart_nam[i]}</option>`;
                    }
                    $('#cart_id').html(output);
                    $('#current_customer').text(data.current_customer);
                    $('#cart').empty().html(data.view);
                },
                complete: function () {
                    $('#loading').addClass('d-none');
                }
            });
    }
</script>
<script>
    "use strict";
    function clear_cart()
    {
        let url = "{{ route('clear-cart-id') }}";
        document.location.href=url;
    }
</script>
<script>
    "use strict";
    function new_order()
    {
        let url = "{{ route('new_cart_id') }}";
        document.location.href=url;
    }
</script>
<script>
    "use strict";
    function cart_change(val)
    {
        let  cart_id = val;
        let url = "{{route('change-cart')}}"+'/?cart_id='+val;
        document.location.href=url;
    }
</script>
<script>
    "use strict";
    function extra_discount()
    {
        //let  user_id = $('#customer').val();
        let discount = $('#dis_amount').val();
        let type = $('#type_ext_dis').val();
        //let  cart_id = $('#cart_id').val();
        if(discount > 0)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: 'https://6valley.6amtech.com/admin/pos/discount',
                data: {
                    _token: 'V9jzOW25DytEFhU0W3hDDV333dNIKDXMEATx7uyE',
                    discount:discount,
                    type:type,
                    //cart_id:cart_id
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                   // console.log(data);
                    if(data.extra_discount==='success')
                    {
                        toastr.success('Extra discount added successfully', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }else if(data.extra_discount==='empty')
                    {
                        toastr.warning('Your cart is empty', {
                            CloseButton: true,
                            ProgressBar: true
                        });

                    }else{
                        toastr.warning('This discount is not applied for this amount', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }

                    $('.modal-backdrop').addClass('d-none');
                    $('#cart').empty().html(data.view);

                    $('#search').focus();
                },
                complete: function () {
                    $('.modal-backdrop').addClass('d-none');
                    $(".footer-offset").removeClass("modal-open");
                    $('#loading').addClass('d-none');
                }
            });
        }else{
            toastr.warning('Amount can not be negative or zero!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    }
</script>
<script>
    "use strict";
    function coupon_discount()
    {

        let  coupon_code = $('#coupon_code').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: 'https://6valley.6amtech.com/admin/pos/coupon-discount',
                data: {
                    _token: 'V9jzOW25DytEFhU0W3hDDV333dNIKDXMEATx7uyE',
                    coupon_code:coupon_code,
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                    console.log(data);
                    if(data.coupon === 'success')
                    {
                        toastr.success('Coupon added successfully', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }else if(data.coupon === 'amount_low')
                    {
                        toastr.warning('This discount is not applied for this amount', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }else if(data.coupon === 'cart_empty')
                    {
                        toastr.warning('Your cart is empty', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                    else {
                        toastr.warning('Coupon is invalid', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }

                    $('#cart').empty().html(data.view);

                    $('#search').focus();
                },
                complete: function () {
                    $('.modal-backdrop').addClass('d-none');
                    $(".footer-offset").removeClass("modal-open");
                    $('#loading').addClass('d-none');
                }
            });

    }
</script>
<script>
    $(document).on('ready', function () {
            });
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    function set_category_filter(id) {
        var nurl = new URL('https://6valley.6amtech.com/admin/pos');
        nurl.searchParams.set('category_id', id);
        location.href = nurl;
    }


    $('#search-form').on('submit', function (e) {
        e.preventDefault();
        var keyword= $('#datatableSearch').val();
        var nurl = new URL('https://6valley.6amtech.com/admin/pos');
        nurl.searchParams.set('keyword', keyword);
        location.href = nurl;
    });

    function store_key(key, value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "V9jzOW25DytEFhU0W3hDDV333dNIKDXMEATx7uyE"
            }
        });
        $.post({
            url: 'https://6valley.6amtech.com/admin/pos/store-keys',
            data: {
                key:key,
                value:value,
            },
            success: function (data) {
                toastr.success(key+' '+'Selected!', {
                    CloseButton: true,
                    ProgressBar: true
                });
            },
        });
    }

    function addon_quantity_input_toggle(e)
    {
        var cb = $(e.target);
        if(cb.is(":checked"))
        {
            cb.siblings('.addon-quantity-input').css({'visibility':'visible'});
        }
        else
        {
            cb.siblings('.addon-quantity-input').css({'visibility':'hidden'});
        }
    }
    // function quickView(product_id) {
    //     $.ajax({
    //         url: '{{ route('quick-view') }}',
    //         type: 'GET',
    //         data: {
    //             product_id: product_id
    //         },
    //         dataType: 'json', // added data type
    //         beforeSend: function () {
    //             $('#loading').show();
    //         },
    //         success: function (data) {
    //             console.log("success...");
    //             console.log(data);

    //             // $("#quick-view").removeClass('fade');
    //             // $("#quick-view").addClass('show');

    //             $('#quick-view').modal('show');
    //             $('#quick-view-modal').empty().html(data.view);
    //         },
    //         complete: function () {
    //             $('#loading').hide();
    //         },
    //     });
    // }

    function quickView(product_id)
    {
        $.ajax({
            url:'{{ route('quick-view') }}',
            type:'GET',
            data:{
                product_id:product_id
            },
            dataType:'json',
            beforeSend:function()
            {
                $('#loading').show();
            },
            success: function (data) {
                console.log("success...");
                console.log(data);

              // $("#quick-view").removeClass('fade');
                 // $("#quick-view").addClass('show');

                 $('#quick-view').modal('show');
              $('#quick-view-modal').empty().html(data.view);
             },
        });
    }

    function checkAddToCartValidity() {
        var names = {};
        $('#add-to-cart-form input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });
        if ($('input:radio:checked').length == count) {
            return true;
        }
        return false;
    }

    function cartQuantityInitialize() {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            var fieldName = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry, the minimum value was reached'
                });
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry, stock limit exceeded.'
                });
                $(this).val($(this).data('oldValue'));
            }
        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

    function getVariantPrice() {
        if ($('#add-to-cart-form input[name=quantity]').val() > 0) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route('pos.variant_price') }}',
                data: $('#add-to-cart-form').serializeArray(),
                success: function (data) {


                    $('#add-to-cart-form #chosen_price_div').removeClass('d-none');
                    $('#add-to-cart-form #chosen_price_div #chosen_price').html(data.price);
                   // $('#set-discount-amount').html(data.discount);
                }
            });
        }
    }

    function addToCart(form_id = 'add-to-cart-form') {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type:"post",
                url: '{{ route('pos.add-to-cart') }}',
                data: $('#' + form_id).serializeArray(),
                success: function (data) {


                    if (data.data == 1) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Cart',
                            text: 'Product already added in cart'
                        });
                        return false;
                    } else if (data.data == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Cart',
                            text: 'Sorry  product is out of stock.'
                        });
                        return false;
                    }
                    $('.call-when-done').click();

                    toastr.success('Item has been added in your cart!', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#cart').empty().html(data.view);
                    //updateCart();
                    $('.search-result-box').empty().hide();
                    $('#search').val('');
                },
                complete: function () {
                    $('#loading').hide();
                }
            });

    }


    function removeFromCart(key) {
        //console.log(key);
        $.post('{{ route('remove-from-cart') }}',
        {_token: '{{ csrf_token() }}', key: key},
         function (data) {

            $('#cart').empty().html(data.view);
            if (data.errors) {
                for (var i = 0; i < data.errors.length; i++) {
                    toastr.error(data.errors[i].message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            } else {
                //updateCart();

                toastr.info('Item has been removed from cart', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }


        });
    }

    function emptyCart() {
        Swal.fire({
            title: 'Are you sure ',
            text: 'You want to remove all items from cart!!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '#161853',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.post('https://6valley.6amtech.com/admin/pos/empty-cart', {_token: 'V9jzOW25DytEFhU0W3hDDV333dNIKDXMEATx7uyE'}, function (data) {
                    $('#cart').empty().html(data.view);
                    toastr.info('Item has been removed from cart', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                });
            }
        })
    }

    function updateCart() {
        $.post('https://6valley.6amtech.com/admin/pos/cart-items', {_token: 'V9jzOW25DytEFhU0W3hDDV333dNIKDXMEATx7uyE'}, function (data) {
            $('#cart').empty().html(data);
        });
    }

   $(function(){
        $(document).on('click','input[type=number]',function(){ this.select(); });
    });

 function updateQuantity(key,qty,e){

if(qty!==""){
    var element = $( e.target );
    var minValue = parseInt(element.attr('min'));
    // maxValue = parseInt(element.attr('max'));
    var valueCurrent = parseInt(element.val());

    //var key = element.data('key');

    $.post('{{ route('update-from-cart') }}', {_token: '{{ csrf_token() }}', key: key, quantity:qty}, function (data) {

        if(data.qty<0)
        {
            toastr.warning('product_quantity_is_not_enough!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
        if(data.upQty==='zeroNegative')
        {
            toastr.warning('Product_quantity_can_not_be_zero_or_less_than_zero_in_cart!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
        if(data.qty_update==1){
            toastr.success('Product_quantity_updated!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
        $('#cart').empty().html(data.view);
    });
}else{
    var element = $( e.target );
    var minValue = parseInt(element.attr('min'));
    var valueCurrent = parseInt(element.val());

    $.post('{{ route('update-from-cart') }}', {_token: '{{ csrf_token() }}', key: key, quantity:minValue}, function (data) {

        if(data.qty<0)
        {
            toastr.warning('product_quantity_is_not_enough!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
        if(data.upQty==='zeroNegative')
        {
            toastr.warning('Product_quantity_can_not_be_zero_or_less_than_zero_in_cart!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
        if(data.qty_update==1){
            toastr.success('Product_quantity_updated!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
        $('#cart').empty().html(data.view);
    });
}

// Allow: backspace, delete, tab, escape, enter and .
if(e.type == 'keydown')
{
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
}

};

    // INITIALIZATION OF SELECT2
    // =======================================================
    $('.js-select2-custom').each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
    });

    $('.js-data-example-ajax').select2({
        ajax: {

            url: '{{ route('customers') }}',
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data) {
                return {
                results: data
                };
            },
            __port: function (params, success, failure) {
                var $request = $.ajax(params);

                $request.then(success);
                $request.fail(failure);

                return $request;
            }
        }
    });

    $('#order_place').submit(function(eventObj) {
        if($('#customer').val())
        {
            $(this).append('<input type="text" name="user_id" value="'+$('#customer').val()+'" /> ');
        }
        return true;
    });

</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="https://6valley.6amtech.com/public/assets/admin/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>
