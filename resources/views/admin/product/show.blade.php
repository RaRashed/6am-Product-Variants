@extends('admin.layouts.master')

@section('content')

<div class="card-body">

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Product detail</th>
                <td>{{ $product->detail }}</td>

            </tr>
            <tr>
                <th>Gallery Image</th>



                 <td>
                    <table class="table table-bordered">
                        <tr>

                            @foreach ($product->productimages as $img )
                            <td class="imgcol{{ $img->id }}">



                                <img src="{{ asset('storage/'.$img->prod_image) }}" width="100px" height="100px" alt="">


                            </td>

                            @endforeach

                        </tr>

                    </table>
                </td>

            </tr>

        </table>
    </div>
</div>
@endsection
