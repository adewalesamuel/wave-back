<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountry as StoreCountryRequest;
use App\Http\Requests\UpdateCountry as UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'countries' => $countries
                ]
            ];

        return response()->json($data, 200);
    }

    public function projects(Country $country) {
        $data = [
            'success' => true,
            'data' => [
                'projects' => $country->projects->sortByDesc('created_at')->values()->all()
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
    public function store(StoreCountryRequest $request)
    {
        $data = $request->validated();

        $country = new Country;
        
        $country->name = $data['name'];
        $country->code = $data['code'] ?? null;
        $country->created_by = auth('api')->user()->id;
            
        $country->save();

        $data = [
            'success' => true,
            'data' => [
                'country' => $country
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $data = [
            'success' => true,
            'data' => [
                'country' => $country
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $data = $request->validated();
        
        $country->name = $data['name'];
        $country->code = $data['code'] ?? null;
        $country->updated_by = auth('api')->user()->id;
            
        $country->save();

        $data = [
            'success' => true,
            'data' => [
                'country' => $country
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        $data = [
             'success' => true,
             'data' => [
                    'country' => $country
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
