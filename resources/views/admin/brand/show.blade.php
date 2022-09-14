@extends('admin.layouts.master')

@section('content')


<table class="table table-striped table-dark">
    <thead>
      <tr>

        <th scope="col">Name</th>

      </tr>
    </thead>
    <tbody>
      <tr>

        <td>{{ $brand->name }}</td>

      </tr>

    </tbody>
  </table>

  @endsection
