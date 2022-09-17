@extends('admin.layouts.mmaster')

@section('content')

<div class="page-header">
    <h3 class="page-title"> Form elements </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
      </ol>
    </nav>
  </div>
  @if ($message = Session::get('success'))

  <div class="alert alert-success">

      <p>{{ $message }}</p>

  </div>

@endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<div class="row">


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Product</h4>
            <p class="card-description"> Product Add</p>

             <form action="{{route('product.store')}}" class="product_form" id="product_form" method="POST" enctype="multipart/form-data">

                @csrf
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name[]" placeholder="Enter category name" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-9">
                    <select name="category_id" class="form-control">
                        <option value="">Please select category</option>
                        @foreach($categories as $category)

                        <option value="{{$category->id }}">{{ $category->name }}</option>
                        @endforeach
                       </select>
                </div>
              </div>
              <div class="form-group row">form-control
                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Brand</label>
                <div class="col-sm-9">
                    <select name="brand_id" class="form-control">
                        <option value="">Please select Brand</option>
                        @foreach($brands as $brand)

                        <option value="{{$brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                       </select>
                </div>
              </div>

              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                    <h4 class="card-title">Variants</h4>

                      <div class="row">
                        <div class="col-md-6">


                            <label for="colors">
                                Colors :
                                </label>
                                <label class="switch">
                                    <input type="checkbox" class="status" value="" id="checkbox1" name="colors_active" value="false">
                                    <span class="slider round"></span>
                                    </label>
                          <div class="form-group row">

                            <div class="col-sm-9">




<select class="js-example-basic-multiple-color js-states js-example-responsive form-control color-var-select" name="colors[]" multiple="multiple" id="colors-selector"  disabled>
    @foreach ($colors as $color )
    <option value="{{ $color->id }}">{{ $color->name }}</option>

    @endforeach

  </select>


                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">


                            <label for="colors">
                                Attribute :
                                </label>
                          <div class="form-group row">
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple-attribute form-control" name="choice_attributes[]" id="choice_attributes" multiple="multiple">
                                    <option value="size">Size</option>
                                    <option value="type">Type</option>
                                  </select>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>

              <div class="form-group row">

                <div class="col-sm-9 customer_choice_options" id="customer_choice_options">

                </div>
              </div>


              <div class="pt-4 col-12 sku_combination" id="sku_combination">
{{--
              <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <td class="text-center">
                        <label for="" class="control-label">Variant</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">Variant Price</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">SKU</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">Quantity</label>
                      </td>
                    </tr>
                  </thead>
                  <tbody>

                      <tr>
                      <td>
                        <label for="" class="control-label"></label>
                      </td>
                      <td>
                        <input type="number" name="price_asdfg" value="" min="0" step="0.01" class="form-control" required="">
                      </td>
                      <td>
                        <input type="text" name="sku_asdfg" value="-asdfg" class="form-control" required="">
                      </td>
                      <td>
                        <input type="number" name="qty_asdfg" value="1" min="1" max="1000000" step="1" class="form-control" required="">
                      </td>
                    </tr>
                  </tbody>
                </table> --}}
              </div>






              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Details</label>
                <div class="col-sm-9">
                    <input type="text" name="detail" placeholder="Enter Product Detail" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">

                    <input type="number" name="price" placeholder="Enter Product Quantity" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" name="quantity" placeholder="Enter Product Quantity" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Product Images</label>
                <div class="col-sm-9">
                    <input type="file" name="images[]" multiple placeholder="Enter category name" class="form-control" required>
                </div>
              </div>







              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input"> Remember me </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>

      </div>


</div>


























@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple-attribute').select2();
});
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple-color').select2();
    });
    </script>

<script>
$("#checkbox1").change(function() {

if ($(this).is(":checked")) {
  $("#colors-selector").removeAttr('disabled');
}
else{
    $("#colors-selector").attr('disabled','true');
}
});
$('#choice_attributes').on('change', function() {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function() {
                //console.log($(this).val());
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        });
/*
 $('#colors-selector').on('change', function() {
            $('#sku_combination').html(null);
            $.each($("#colors-selector option:selected"), function() {
                //console.log($(this).val());
                add_more_sku_combination($(this).val(), $(this).text());
            });
        });
*/
        function add_more_customer_choice_option(i, name) {
            let n = name.split(' ').join('');
            $('#customer_choice_options').append(
                ' <div class="form-group row"> <div class="col-sm-3"><input type="hidden" name="choice_no[]" value="' + i +
                '"><input type="text" class="form-control" name="choice[]" value="' + n +
                '" placeholder="Choice Title" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' +
                i +
                '[]" placeholder="Enter choice values"  data-role="tagsinput" onchange="update_sku()"></div></div>'
                );

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }
/*
  function add_more_sku_combination(j, value) {
            let n = name.split(' ').join('');
            $('#sku_combination').append(`

            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">
                        <label for="" class="control-label">Variant</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">Variant Price</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">SKU</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">Quantity</label>
                      </td>
                    </tr>
                  </thead>
                  <tbody>

                      <tr>
                      <td>
                        <label for="" class="control-label"></label>
                        <input type="hidden" name="choice_no[]" value="${j}">
                        <input type="text" class="form-control" name="choice[]" value="${value}" placeholder="Color" readonly>
                      </td>
                      <td>
                        <input type="number" name="price" value="" min="0" step="0.01" class="form-control" required="">
                      </td>
                      <td>
                        <input type="text" name="sku" value="${value}_${j}" class="form-control" required="">
                      </td>
                      <td>
                        <input type="number" name="price" value="1" min="1" max="1000000" step="1" class="form-control" required="">
                      </td>
                    </tr>
                  </tbody>
                </table>
                `);

        }
*/




        $('#colors-selecto').on('change', function() {
            update_sku();
        });

        $('input[name="unit_price"]').on('keyup', function() {
            update_sku();
        });

        function update_sku() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              url: '{{ url('admin/product/sku-combination') }}',
               method: "post",
                data: $('#product_form').serialize(),
                success: function(data) {
                    $('#sku_combination').html(data.view);
                    if (data.length > 1) {
                        $('#quantity').hide();
                    } else {
                        $('#quantity').show();
                    }
                }
            });
        }
</script>
<script>
        function check() {
            Swal.fire({
                title: 'Are you sure?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var formData = new FormData(document.getElementById('product_form'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: 'https://6valley.6amtech.com/admin/product/store',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // console.log(data.errors);
                        // return false;
                        if (data.errors) {
                            for (var i = 0; i < data.errors.length; i++) {
                                toastr.error(data.errors[i].message, {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                        } else {
                            toastr.success(
                            'Product added successfully!', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                            $('#product_form').submit();
                        }
                    }
                });
            })
        };
    </script>

{{--   <script>
                update_qty();
                function update_qty()
                {
                  var total_qty = 0;
                  var qty_elements = $('input[name^="qty_"]');
                  for(var i=0; i<qty_elements.length; i++)
                  {
                    total_qty += parseInt(qty_elements.eq(i).val());
                  }
                  if(qty_elements.length > 0)
                  {

                    $('input[name="current_stock"]').attr("readonly", true);
                    $('input[name="current_stock"]').val(total_qty);
                  }
                  else{
                    $('input[name="current_stock"]').attr("readonly", false);
                  }
                }
                $('input[name^="qty_"]').on('keyup', function () {
                  var total_qty = 0;
                  var qty_elements = $('input[name^="qty_"]');
                  for(var i=0; i<qty_elements.length; i++)
                  {
                    total_qty += parseInt(qty_elements.eq(i).val());
                  }
                  $('input[name="current_stock"]').val(total_qty);
                });

              </script> --}}


@endsection

@section('styles')
<style type="text/css">
    .bootstrap-tagsinput .tag {
       margin-right: 2px;
       color: white !important;
       background-color: #4137ce;
       padding: .2em .6em .3em;
       font-size: 100%;
       font-weight: 700;
       vertical-align: baseline;
       border-radius: .25em;
    }
 </style>
@endsection



