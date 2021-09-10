<?php

namespace App\Http\Controllers;

use App\Models\Disaggregation;
use App\Models\Indicator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDisaggregation as StoreDisaggregationRequest;
use App\Http\Requests\UpdateDisaggregation as UpdateDisaggregationRequest;

class DisaggregationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $disaggregations = Disaggregation::orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'disaggregations' => $disaggregations
                ]
            ];

        return response()->json($data, 200);
    }

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
     * @param  \App\Models\Disaggregation  $disaggregation
     * @return \Illuminate\Http\Response
     */
    public function show(Disaggregation $disaggregation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disaggregation  $disaggregation
     * @return \Illuminate\Http\Response
     */
    public function edit(Disaggregation $disaggregation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disaggregation  $disaggregation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disaggregation $disaggregation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disaggregation  $disaggregation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disaggregation $disaggregation)
    {
        //
    }
}
