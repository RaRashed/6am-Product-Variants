@extends('layouts.backend_master')

@section('title', 'Products')

@push('css')
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css"
      rel="stylesheet"/>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('backend/css/fm.tagator.jquery.css')}}" rel="stylesheet" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
        .require_star {
            color:red;
        }
        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #5076f4;
        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
@endpush

@section('mainContents')

<div class="row">
    <div class="col-12">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" id="product_form">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Product Info</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Product Name<span class="require_star"> *</span></label>
                                        <input type="text" id="name"
                                     placeholder="name" class="form-control
                                        @error('name') is-invalid @enderror">
                                      </div>
                                    @error('name')
                                        <p>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="category_id">Category select<span class="require_star"> *</span></label>
                                        <select onchange="subCategoryList(this.value)" class="form-control bg-white color-black @error('category_id') is-invalid @enderror"
                                         name="category_id" id="category_id">
                                            <option value="">Select Please</option>
                                            @foreach ($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                    @error('category_id')
                                    <p>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="subcategory_id">Sub Category select</label>
                                        <select onchange="subsubCategoryList(this.value)" class="form-control bg-white color-black @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory_id">
                                        </select>
                                    </div>
                                    @error('subcategory_id')
                                    <p>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="subsubcategory_id">Sub Sub Category select</label>
                                        <select class="form-control bg-white color-black @error('subsubcategory_id') is-invalid @enderror"
                                         name="subsubcategory_id" id="subsubcategory_id">
                                        </select>
                                    </div>
                                    @error('subsubcategory_id')
                                    <p>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="product_qty">Product Quantity<span class="require_star"> *</span></label>
                                        <input type="number" value="{{ old('product_qty') }}"
                                        id="product_qty" name="product_qty"
                                         placeholder="Product Quantity" class="form-control
                                        @error('product_qty') is-invalid @enderror">
                                      </div>
                                    @error('product_qty')
                                        <p>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="selling_price">Price<span class="require_star"> *</span></label>
                                        <input type="number" min="0" step="0.01" placeholder="Unit price" name="unit_price" value="" class="form-control" required>
                                      </div>
                                    @error('selling_price')
                                        <p>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-check form-switch" for="discount_price">Colors
                                            <input class="m-2" type="checkbox" id="box" name="colors_active"></label>
                                        <select disabled class="form-control js-example-basic-multiple" id="colors" name="colors[]" multiple="multiple">
                                            @foreach ($colors as $color)
                                            <option value="{{$color->name}}">{{$color->name}}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                    @error('colors')
                                    <p>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="discount_price" class="mt-3">Attributes<span class="require_star"> *</span></label>
                                        <select class="form-control text-black bg-white js-example-basic-multiple" name="attributes[]" multiple="multiple" id="attributes">
                                            @forelse ($attributes as $att)
                                                <option class="form-control" value="{{ $att }}">
                                                    {{ $att }}</option>

                                            @empty
                                            @endforelse
                                        </select>
                                      </div>
                                    @error('colors')
                                    <p>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" id="inpts">

                            </div>

                            <div class="row" id="skus">

                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="sku_combination mt-3" id="sku_combination">

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary p-2 mt-5 text-white">
                                <i class="fas fa-plus-circle"></i>
                                <span>Create Product</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')



<script>

    $(document).ready(function(){

        $("#box").click(function(){
            if ($('#box').is(':checked')) {
            $("#colors").removeAttr("disabled");
            }else{
                $("#colors").attr("disabled", "true");
            }
        });

        $('#colors').on('change', function (e) {
				e.preventDefault();
                update_sku();
	    });

        $('input[name="unit_price"]').on('keyup', function() {
            update_sku();
        });


        $('#attributes').on('change', function() {
            $('#customer_choice_options').html(null);
            $.each($("#attributes option:selected"), function() {
                //console.log($(this).val());
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        });

        function add_more_customer_choice_option(i, name) {
            let n = name.split(' ').join('');
            $('#inpts').append(
                '<div class="row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="' + i +
                '"><input type="text" class="form-control" name="choice[]" value="' + n +
                '" placeholder="Choice Title" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' +
                i +
                '[]" placeholder="Enter choice values" data-role="tagsinput" onchange="update_sku()"></div></div>'
                );

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }


    });
</script>

<script>
        function update_sku() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('sku.info')}}",
            data: $('#product_form').serialize(),
            success: function(data) {
            // $('#sku_combination').html(data.view);
                console.log(data.view)
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="{{asset('backend/js/fm.tagator.jquery.js')}}" rel="stylesheet" />

<script>

    //get sub category by dependenci select box
    function subCategoryList(category_id) {
        if (category_id) {
            $.ajax({
                url: "{{route('subcategory.list')}}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: _token
                },
                dataType: "JSON",
                success: function (data) {
                    $('#subcategory_id').html('');
                    $('#subcategory_id').html(data);
                },
                error: function (xhr, ajaxOption, thrownError) {
                    console.log(thrownError + '\r\n' + xhr.statusText + '\r\n' + xhr.responseText);
                }
            });
        }
    }
        //get sub sub category by dependenci select box
        function subsubCategoryList(category_id) {
        if (category_id) {
            $.ajax({
                url: "{{route('subsubcategory.list')}}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: _token
                },
                dataType: "JSON",
                success: function (data) {
                    $('#subsubcategory_id').html('');
                    $('#subsubcategory_id').html(data);
                },
                error: function (xhr, ajaxOption, thrownError) {
                    console.log(thrownError + '\r\n' + xhr.statusText + '\r\n' + xhr.responseText);
                }
            });
        }
    }
</script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush
