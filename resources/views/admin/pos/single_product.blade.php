<style>

</style>

<div class="product-card card" onclick="quickView('{{$product->id}}')" style="cursor: pointer;">

 <div class="card-header inline_product clickable p-0" style="height:134px;width:100%;overflow:hidden;">
        <div class="d-flex align-items-center justify-content-center d-block">
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
            </a>
        </div>
    </div>
    <div class="card-body inline_product text-center p-1 clickable"
         style="height:3.5rem; max-height: 3.5rem">
        <div style="position: relative;" class="product-title1 text-dark font-weight-bold">
            {{ Str::limit($product['name'], 13) }}
        </div>
        <div class="justify-content-between text-center">
            <div class="product-price text-center">
        ${{$product->product_price  }}
        <strike style="font-size: 12px!important;color: grey!important;">
            ${{$product->product_price  }}
        </strike><br>
                {{-- @if($product->discount > 0)
                    <strike style="font-size: 12px!important;color: grey!important;">
                        ${{$product->product_price  }}
                    </strike><br>
                @endif --}}
            </div>
        </div>
    </div>
</div>
