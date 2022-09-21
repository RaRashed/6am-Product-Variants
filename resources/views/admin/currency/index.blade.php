@extends('admin.layouts.mmaster')
@section('content')


<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
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

    <div class="col-md-6">
    <div class="card">
    <div class="card-header">
    <h5 class="text-center">
    <i class="tio-money"></i>
    Add New Currency
    </h5>
    </div>
    <div class="card-body">
    <form action="{{ route('currency.store') }}" method="post">
  @csrf
     <div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label for="">Currency Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter currency Name">
    </div>
    <div class="col-md-6">
        <label for="">Currency Symbol</label>
    <input type="text" name="symbol" class="form-control" id="symbol" placeholder="Enter currency symbol">
    </div>
    </div>
    </div>
    <div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label for="">Currency code</label>

    <input type="text" name="code" class="form-control" id="code" placeholder="Enter currency code">
    </div>
     <div class="col-md-6">
        <label for="">Currency Exchange Rate</label>
    <input type="number" min="0" max="1000000" name="rate" step="0.00000001" class="form-control" id="exchange_rate" placeholder="Enter currency exchange rate">
    </div>
    </div>
    </div>
    <div class="form-group text-center">
    <button type="submit" id="add" class="btn btn-primary text-capitalize" style="color: white">
    <i class="fa fa-add"></i> Add
    </button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card h-100">
    <div class="card-header">
    <h5 class="text-center">
    <i class="tio-settings"></i>
    System default currency
    </h5>
    </div>
    <div class="card-body">
    <form class="form-inline_"  action="{{ route('currency-system-update')}}"  method="post">
        @csrf
        <select class="js-example-basic-single form-control" name="default_currency" id="default_currency">
         @foreach ($currencies as $currency)
         <option value="{{ $currency->id }}">{{ $currency->name }}</option>

         @endforeach

          </select>
    <div class="col-md-12 mt-3">
    <div class="form-group mb-2">
    <button type="submit" class="btn btn-primary mb-2">Save</button>
    </div>
    </div>

    </form>
    </div>
    </div>
    </div>

<div class="col-md-12">
    <div class="card">
    <div class="card-header">
    <div class="row justify-content-between align-items-center flex-grow-1">
    <div class="col-lg-3 mb-3 mb-lg-0">
    <div class="flex-start">
    <div><h5>Currency Table</h5>
    </div>
    <div class="mx-1"><h5 style="color: red;">({{ count($currencies) }})</h5></div>
    </div>
    </div>
    {{-- <div class="col-lg-6">

    <form action="{{ route('search') }} " method="GET">
    <div class="input-group input-group-merge input-group-flush">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <i class="fa fa-search"></i>
    </div>
    </div>
    <input id="datatableSearch_" type="search" name="search" class="form-control" placeholder="Search Currency Name or Currency Code" aria-label="Search orders" value="" required="">
    <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>

    </div> --}}
    </div>
    </div>


    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
    <thead class="thead-light">
    <tr class="text-center">
    <th scope="col">SL#</th>
    <th scope="col">Currency name</th>
    <th scope="col">Currency symbol</th>
    <th scope="col">Currency code</th>
    <th scope="col">Exchange rate
    (1 EUR= ?)
    </th>

    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

{{ $convert_value->rate }}


 @foreach ($currencies as $key => $currency )
    <tr class="text-center">
        <td>{{ $key }}</td>
        <td>{{ $currency->name }}</td>
        <td>{{ $currency->symbol}}</td>
        <td>{{ $currency->code }}</td>
        <td>
             {{ $currency->rate / $convert_value->rate}}






        </td>

        <td>
            <form action="{{ route('currency.destroy',$currency->id) }}" method="POST">



                <a class="btn btn-info btn-sm" href="{{ route('currency.show',$currency->id) }}"><i class="fa fa-eye"></i></a>



                <a class="btn btn-primary btn-sm" href="{{ route('currency.edit',$currency->id) }}"><i class="fa fa-edit"></i></a>



                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

            </form>
        </td>
        </tr>

    @endforeach






    </tbody>
    </table>
    </div>
    </div>
    <div class="card-footer">
    </div>
    </div>
    </div>






          </div>
      </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection
