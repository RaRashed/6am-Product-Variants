@extends('admin.layouts.master')

@section('content')


<table class="table table-striped table-dark">
    <thead>
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Discount</th>

        <th scope="col">Validity Date</th>
        <th scope="col">Created Date</th>



      </tr>
    </thead>
    <tbody>
      <tr>

        <td>{{ $coupon->name }}</td>
        <td>{{ $coupon->discount }}</td>
        <td>{{Carbon\Carbon::parse($coupon->validity)->format('D, d F Y')}}</td>
        <td>{{Carbon\Carbon::parse($coupon->created_at)->format('D, d F Y')}}</td>

      </tr>

    </tbody>
  </table>

  @endsection
