<?php
return [

    ####################################
    //  merchant Information
    ####################################
    "profile_id" => env('profile_id'),

    "merchant_email" => env('rnrashedrn@gmail.com'),

    "merchant_secretKey" => env('merchant_secretKey'),


    ####################################
    //  Website Information
    ####################################

    'currency' => "USD",
    //Currency of the amount stated. 3 character ISO currency code

    "msg_lang" => "en",
    //Language of the PayPage to be created. Invalid or blank entries will default to English.(Englsh/Arabic)

    "site_url" => env('http://localhost:8000'), //should be like that in local => 'http://localhost:8000'
    //The requesting website be exactly the same as the website/URL associated with your PayTabs Merchant Account

    'return_url' => env('http://localhost:8000') . "/paytabs_response", //should be like that in local => 'http://localhost:8000/paytabs_response'

    "cms_with_version" => "API USING PHP",

    "paypage_info" => "1"



];
