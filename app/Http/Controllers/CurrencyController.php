<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use DB;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies=Currency::all();
        $convert_value = DB::table('currencies')->where('is_default', 1)->first('rate');
        //dd($convert_value);

        //eturn $convert_value;
        return view('admin.currency.index', [
            'currencies' => $currencies,'convert_value' => $convert_value
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:currencies',
            'symbol' =>'required',
            'code' =>'required',
            'rate' =>'required'



        ]);
        $currency = new Currency();
        $currency->name =$request->name;
        $currency->symbol =$request->symbol;
        $currency->code =$request->code;
        $currency->rate =$request->rate;
        $currency->save();

        return redirect(route('currency.index'))->with('success', 'Currency Created Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::find($id);
        return view('admin.currency.edit',['currency'=>$currency]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' =>'required|unique:currencies',
            'symbol' =>'required',
            'code' =>'required',
            'rate' =>'required'



        ]);
        $currency = Currency::find($id);
        $currency->name =$request->name;
        $currency->symbol =$request->symbol;
        $currency->code =$request->code;
        $currency->rate =$request->rate;

        $currency->save();

        return redirect(route('currency.index'))->with('success', 'Currency Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency=Currency::find($id);
        $currency->delete();
        return redirect(route('currency.index'))->with('success', 'Currency Deleted Successfully');

    }
    public function currency_update(Request $request)
    {
        //dd($request->all());
           //    $a=DB::table('currencies')->where('is_default', 1)->get()->all();
    //    dd($a);
        DB::table('currencies')->where('is_default', 1)->update( [
            'is_default' => 0
        ]);



    DB::table('currencies')->where('id', $request->default_currency)->update(['is_default' => 1]);
        return back()->with('success', 'Default Currency Changed');
    }

    // public function searchCurrency(Request $request)
    // {

    //     $currencies=Currency::all();
    //     $convert_value = DB::table('currencies')->where('is_default', 1)->first('rate');
    //         $search= $request->search;


    //         $search_currency = DB::table('currencies')->where('name','LIKE','%'.$search.'%')->get();

    //             return view('admin.currency.index',['search_currency'=>$search_currency,'currencies'=>$currencies,'convert_value'=>$convert_value]);



    // }
}
