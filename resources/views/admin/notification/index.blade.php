@extends('admin.layouts.mmaster')
@section('content')


<div class="page-header">
    <h3 class="page-title"> Notification SYSTEM </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Notification</a></li>
        <li class="breadcrumb-item active" aria-current="page">Notification SYSTEM</li>
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

      @if ($message = Session::get('error'))

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

      <center>

        <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>

    </center>
        <div class="card-body">
          <h4 class="card-title">Nexmo SMS</h4>
          <p class="card-description"> SMS System</p>


          <form action="{{ route('send.notification') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputUsername1"><strong>Title</strong></label>
                <input type="text" class="form-control" name="title" placeholder="title" required>
              </div>
            <div class="form-group">
              <label for="exampleInputUsername1"><strong>Message</strong></label>
              <input type="text" class="form-control" name="body" placeholder="Write your Message" required>
            </div>



            <button type="submit" class="btn btn-primary">Send Notification</button>

          </form>
        </div>
      </div>
    </div>

    {{-- <div class="col-md-6 grid-margin stretch-card">
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
    </div> --}}

  </div>
@endsection

@section('scripts')
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

<script>


const firebaseConfig = {
      apiKey: "AIzaSyD5pLMswxRM8ylkyua2DHBCxlC0oycEXHk",
      authDomain: "pushnotification-879ac.firebaseapp.com",
      projectId: "pushnotification-879ac",
      storageBucket: "pushnotification-879ac.appspot.com",
      messagingSenderId: "617928981054",
      appId: "1:617928981054:web:5a661c7421267b13f92f6f",
      measurementId: "G-FCE3C620XB"
    };



    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();



    function initFirebaseMessagingRegistration() {

            messaging

            .requestPermission()

            .then(function () {

                return messaging.getToken()

            })

            .then(function(token) {

                console.log(token);



                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });



                $.ajax({

                    url: '{{ route("save-token") }}',

                    type: 'POST',


                    data: {

                        token: token

                    },

                    dataType: 'JSON',

                    success: function (response) {

                        alert('Token saved successfully.');

                    },

                    error: function (err) {

                        console.log('User Chat Token Error'+ err);

                    },

                });



            }).catch(function (err) {

                console.log('User Chat Token Error'+ err);

            });

     }



    messaging.onMessage(function(payload) {

        const noteTitle = payload.notification.title;

        const noteOptions = {

            body: payload.notification.body,

            icon: payload.notification.icon,

        };

        new Notification(noteTitle, noteOptions);

    });



</script>

{{-- <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyD5pLMswxRM8ylkyua2DHBCxlC0oycEXHk",
      authDomain: "pushnotification-879ac.firebaseapp.com",
      projectId: "pushnotification-879ac",
      storageBucket: "pushnotification-879ac.appspot.com",
      messagingSenderId: "617928981054",
      appId: "1:617928981054:web:5a661c7421267b13f92f6f",
      measurementId: "G-FCE3C620XB"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
  </script> --}}

@endsection
