<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PushNotificationController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {

        return view('admin.notification.index');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function saveToken(Request $request)

    {

        auth()->user()->update(['device_token'=>$request->token]);

        return response()->json(['token saved successfully.']);

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function sendNotification(Request $request)

    {

        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();



        $SERVER_API_KEY ='AAAAj99v-j4:APA91bFykXottf5HNYy1LOTW5sylXU2_0LWR23o89tWo796onjeIi4AO6Nv8p5vIRHgrxsfdrTzTA0SxgtJYF5CzJxT58tb15Y8doJmidPuAQhjCaFsunnH0de0B_IDU28EcaWpN2SHC';



        $data = [

            "registration_ids" => $firebaseToken,

            "notification" => [

                "title" => $request->title,

                "body" => $request->body,

            ]

        ];

        $dataString = json_encode($data);



        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];



        $ch = curl_init();



        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);



        $response = curl_exec($ch);
        if($response === FALSE)
        {
            die('Curl failed: '. curl_error($ch));
        }
        curl_close($ch);



return redirect()->back();

    }
}
