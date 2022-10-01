@extends('frontend.layouts.frontend_master')
@section('content')

<div class="col-md-6">
    <div class="card-body">
        <form action="{{ route('admin.message.store') }}" method="POST">
            @csrf
            <div class="">
                <label for="">Message</label>
                <input type="text" class="form-control" name="message" placeholder="say something">
            </div>
            <div>
                <button type="submit" class="form-control">Send Message</button>
            </div>

        </form>

    </div>

</div>

@endsection
