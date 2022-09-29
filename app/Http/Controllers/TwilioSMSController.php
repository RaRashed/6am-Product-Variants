<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

use Twilio\Rest\Client;

use App\Clients;

class TwilioSMSController extends Controller
{
    public function index()

    {

        $receiverNumber = request()->number;


        $message = request()->twiliosms;




        try {



            $account_sid = getenv("TWILIO_SID");

            $auth_token = getenv("TWILIO_TOKEN");

            $twilio_number = getenv("TWILIO_FROM");



            $client = new Client($account_sid, $auth_token);

            $client->messages->create('+88'.$receiverNumber, [

                'from' => $twilio_number,

                'body' => request()->twiliosms]);



return redirect()->back()->with('success','Sms Sent succesfully');



        } catch (\Exception $e) {

            return $e->getMessage();

        }

    }
}
