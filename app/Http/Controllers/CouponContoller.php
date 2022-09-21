<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponContoller extends Controller
{
    protected $coupon;
    public function __construct(Coupon $coupon)
    {
        $this->coupon=$coupon;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->coupon::all();
        return view('admin.coupon.index',['coupons'=> $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
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
            'name' => 'required',
            'discount' => 'required',
            'validity' => 'required',
        ]);

        Coupon::insert([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity,
            'created_at'=> Carbon::now(),
        ]);
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon =$this->coupon::find($id);
        return view('admin.coupon.show',['coupon' =>$coupon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=$this->coupon::find($id);
        return view('admin.coupon.edit',['coupon'=>$coupon]);

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

            'name' => 'required',
            'validity'=>'required',
            'discount'=>'required'


        ]);


         $coupon = $this->coupon::find($id);
        $coupon->update($request->all());



        return redirect()->route('coupon.index')

                        ->with('success','Coupon updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $coupon = $this->coupon::find($id);
        $coupon->delete();



        return redirect()->route('coupon.index')

                        ->with('success','Coupon deleted successfully');
    }
}

        // DB::table('business_settings')->where('id', 1)
        //         ->update([
        //             'value' => $convertion_factor,
        //             'updated_at' => now()
        //         ]);
