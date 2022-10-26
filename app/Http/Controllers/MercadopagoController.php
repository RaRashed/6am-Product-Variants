<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use MP;

class MercadopagoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $preference_data = array (
            "items" => array (
                array (
                    "title" => "Test2",
                    "quantity" => 1,
                    "currency_id" => "BRL",
                    "unit_price" => 10.41
                )
            )
        );

        try {
            $preference = MP::create_preference($preference_data);
            return redirect()->to($preference['response']['init_point']);
        } catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
