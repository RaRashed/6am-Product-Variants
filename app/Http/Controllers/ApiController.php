<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\CovidStatisticService;
use Carbon\Carbon;
class ApiController extends Controller
{
    public function index(CovidStatisticService $covidStatisticService) {
        $today = Carbon::now()->toDateString();

        $confirmedCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'confirmed');
        $recoveredCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'recovered');
        $deadCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'deaths');

        return view('admin.api.index', [
            'today' => $today,
            'confirmedCovidCasesUntilToday' => $confirmedCovidCasesUntilToday,
            'recoveredCovidCasesUntilToday' => $recoveredCovidCasesUntilToday,
            'deadCovidCasesUntilToday' => $deadCovidCasesUntilToday,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
