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
Edit {{ $currency->name }} Currency
    </h5>
    </div>
    <div class="card-body">
    <form action="{{ route('currency.update',$currency->id) }}" method="post">
  @csrf
  @method('put')
     <div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label for="">Currency name</label>
    <input type="text" name="name" value="{{ $currency->name }}" class="form-control" id="name" placeholder="Enter currency Name">
    </div>
    <div class="col-md-6">
        <label for="">Currency Symbol</label>
    <input type="text" name="symbol" value="{{ $currency->symbol }}"  class="form-control" id="symbol" placeholder="Enter currency symbol">
    </div>
    </div>
    </div>
    <div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label for="">Currency code</label>
    <input type="text" name="code" value="{{ $currency->code }}"  class="form-control" id="code" placeholder="Enter currency code">
    </div>
     <div class="col-md-6">
        <label for="">Currency Exchange Rate</label>
    <input type="number" min="0" max="1000000" value="{{ $currency->rate }}"  name="rate" step="0.00000001" class="form-control" id="exchange_rate" placeholder="Enter currency exchange rate">
    </div>
    </div>
    </div>
    <div class="form-group text-center">
    <button type="submit" id="add" class="btn btn-primary text-capitalize" style="color: white">
    <i class="fa fa-save"></i> Update
    </button>
    </div>
    </form>
    </div>
    </div>
    </div>






          </div>
      </div>
    </div>
</div>



@endsection
