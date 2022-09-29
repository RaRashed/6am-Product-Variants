@extends('admin.layouts.mmaster')
@section('content')


<div class="page-header">
    <h3 class="page-title"> SMS SYSTEM </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">SMS</a></li>
        <li class="breadcrumb-item active" aria-current="page">SMS SYSTEM</li>
      </ol>
    </nav>

  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
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
        <div class="card-body">
          <h4 class="card-title">Nexmo SMS</h4>
          <p class="card-description"> SMS System</p>
          <form class="forms-sample" action="{{ route('nexmoSMS') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1"><strong>Message</strong></label>
              <input type="text" class="form-control" name="nexmosms" placeholder="Write your Message">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1"><strong>Number</strong></label>
                <input type="text" class="form-control" name="number" placeholder="Write your number">
              </div>


            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Twilio SMS</h4>
            <p class="card-description"> SMS System</p>
            <form class="forms-sample" action="{{ route('twilioSMS') }}" method="get">
                @csrf
              <div class="form-group">
                <label for="exampleInputUsername1"><strong>Message</strong></label>
                <input type="text" class="form-control" name="twiliosms" placeholder="Write your Message" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1"><strong>Number</strong></label>
                <input type="text" class="form-control" name="number" placeholder="Write your Message number" required>
              </div>


              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>
          </div>

      </div>
    </div>
  </div>
@endsection
