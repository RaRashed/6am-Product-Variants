<?php

namespace App\Http\Controllers;

use App\Models\PaytabsInvoice;
// use Basel\Paytabs\Paytabs;
use Illuminate\Http\Request;

class Paytabs {
	private static $instance = null;
    private $merchant_email;
	private $merchant_secretKey;

	const TESTING = 'https://localhost:8000/paytabs/apiv2/index';
	const AUTHENTICATION = 'https://www.paytabs.com/apiv2/validate_secret_key';
	const PAYPAGE_URL = 'https://www.paytabs.com/apiv2/create_pay_page';
	const VERIFY_URL = 'https://www.paytabs.com/apiv2/verify_payment';


    private function __construct()
    {
        $this->merchant_email = config('paytabs.merchant_email');
        $this->merchant_secretKey = config('paytabs.merchant_secretKey');
    }

	public static function getInstance()
	{
		if (self::$instance == null) {
			self::$instance = new Paytabs();
		}
        self::$instance->api_key = "";
		return self::$instance;
	}


	function authentication(){
		$obj = json_decode($this->runPost(self::AUTHENTICATION, array("merchant_email"=> $this->merchant_email, "merchant_secretKey"=>  $this->merchant_secretKey)));
		if($obj->access == "granted")
			$this->api_key = $obj->api_key;
		else
			$this->api_key = "";
		return $this->api_key;
	}

	function create_pay_page($values) {
		$values['merchant_email'] = $this->merchant_email;
		$values['secret_key'] = $this->merchant_secretKey;
		$values['ip_customer'] = $_SERVER['REMOTE_ADDR'];
        $values['ip_merchant'] = isset($_SERVER['SERVER_ADDR'])? $_SERVER['SERVER_ADDR'] : '::1';
        $values['currency'] = config('paytabs.currency');
        $values['msg_lang'] = config('paytabs.msg_lang');
        $values['site_url'] = config('paytabs.site_url');
        $values['return_url'] = config('paytabs.return_url');
        $values['cms_with_version'] = config('paytabs.cms_with_version');
        $values['paypage_info'] = config('paytabs.paypage_info');

		return json_decode($this->runPost(self::PAYPAGE_URL, $values));
	}

	function send_request(){
		$values['ip_customer'] = $_SERVER['REMOTE_ADDR'];
		$values['ip_merchant'] = isset($_SERVER['SERVER_ADDR'])? $_SERVER['SERVER_ADDR'] : '::1';
		return json_decode($this->runPost(self::TESTING, $values));
	}


	function verify_payment($payment_reference){
		$values['merchant_email'] = $this->merchant_email;
		$values['secret_key'] = $this->merchant_secretKey;
		$values['payment_reference'] = $payment_reference;
		return json_decode($this->runPost(self::VERIFY_URL, $values));
	}

	function runPost($url, $fields) {
		$fields_string = "";
		foreach ($fields as $key => $value) {
			$fields_string .= $key . '=' . $value . '&';
		}
		rtrim($fields_string, '&');
		$ch = curl_init();
		$ip = $_SERVER['REMOTE_ADDR'];

		$ip_address = array(
			"REMOTE_ADDR" => $ip,
			"HTTP_X_FORWARDED_FOR" => $ip
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $ip_address);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, 1);

		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

}
class PaytabsController extends Controller
{

    public function index()
    {

        // $pt = app('paytabs'); //the instance through the register service provider singleton

        $result = Paytabs::getInstance()->create_pay_page(array(

            //Customer's Personal Information
            'cc_first_name' => "john",          //This will be prefilled as Credit Card First Name
            'cc_last_name' => "Doe",            //This will be prefilled as Credit Card Last Name
            'cc_phone_number' => "00973",
            'phone_number' => "33333333",
            'email' => "customer@gmail.com",

            //Customer's Billing Address (All fields are mandatory)
            //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected.
            //For other countries, the state can be a string of up to 32 characters.
            'billing_address' => "manama bahrain",
            'city' => "manama",
            'state' => "manama",
            'postal_code' => "00973",
            'country' => "BHR",

            //Customer's Shipping Address (All fields are mandatory)
            'address_shipping' => "Juffair bahrain",
            'city_shipping' => "manama",
            'state_shipping' => "manama",
            'postal_code_shipping' => "00973",
            'country_shipping' => "BHR",

            //Product Information
            "products_per_title" => "Product1 || Product 2 || Product 4",   //Product title of the product. If multiple products then add “||” separator
            'quantity' => "1 || 1 || 1",                                    //Quantity of products. If multiple products then add “||” separator
            'unit_price' => "2 || 2 || 6",                                  //Unit price of the product. If multiple products then add “||” separator.
            "other_charges" => "91.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
            'amount' => "101.00",                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
            'discount' => "1",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount

            //Invoice Information
            'title' => "John Doe",               // Customer's Name on the invoice
            "reference_no" => "1231231",        //Invoice reference number in your system

        ));




        // if ($result->response_code == 4012) {
        //     return redirect($result->payment_url);
        // }
        // if ($result->response_code == 4094) {
        //     return $result->details;
        // }

        return $result;
    }

    public function response(Request $request)
    {

        $result = Paytabs::getInstance()->verify_payment($request->payment_reference);

        if ($result->response_code == 100) {
            //success
            $this->createInvoice((array)$result);
        }
        return $result->result;
    }

    public function createInvoice($request)
    {
        $request['order_id'] = $request["reference_no"];
        PaytabsInvoice::create($request);
    }
}
