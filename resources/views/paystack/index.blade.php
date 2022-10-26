<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if (isset($errors) && count($errors))

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
        @endforeach
    </ul>

@endif

<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">

    @if (isset($errors) && count($errors))

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
        @endforeach
    </ul>

@endif
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>

                </div>
            </p>
            <input type="hidden" name="email" value="rashed@gmail.com">
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800">
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" >
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef()}}">

            <input type="hidden" name="split" value="SPL_EgunGUnBeCareful">


<input type="hidden" name="_token" value="{{ csrf_token() }}">

            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>




</body>
</html>
