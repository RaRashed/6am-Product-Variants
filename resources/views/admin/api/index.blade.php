@extends('admin.layouts.mmaster')
@section('content')
{{$today }}
{{ json_encode($deadCovidCasesUntilToday) }}

@endsection
