<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Vonage\Client\Credentials\Basic;



class NexmoSMSController extends Controller
{

    public function sms()
    {
        return view('admin.sms.index');
    }


    public function index()

    {


        $basic  = new \Vonage\Client\Credentials\Basic("cbfa72d7", "4zlEz9RJ6I13DhnT");
        $client = new \Vonage\Client($basic);



            $receiverNumber = request()->number;

            $message1 = request()->nexmosms;
            $company="6am";



            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS('+88'.$receiverNumber, $company, $message1)
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                return redirect()->back()->with('success','SMS Sent Sucessfully');
            }
            else{



                return redirect()->back()->with('success','SMS Not Sent Sucessfully');

            }






    }
}
