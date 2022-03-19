<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOutcome as StoreOutcomeRequest;
use App\Http\Requests\UpdateOutcome as UpdateOutcomeRequest;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outcomes = Outcome::orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'outcomes' => $outcomes
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
    public function store(StoreOutcomeRequest $request)
    {
        $data = $request->validated();

        $outcome = new Outcome;
        
        $outcome->name = $data['name'];
        $outcome->project_id = $data['project_id'] ?? null;
        $outcome->description = $data['description'] ?? null;
        $outcome->created_by = auth('api')->user()->id;
            
        $outcome->save();

        $data = [
            'success' => true,
            'data' => [
                'outcome' => $outcome
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function show(Outcome $outcome)
    {
        $data = [
            'success' => true,
            'data' => [
                'outcome' => $outcome
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Outcome $outcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutcomeRequest $request, Outcome $outcome)
    {
        $data = $request->validated();
        
        $outcome->name = $data['name'];
        $outcome->project_id = $data['project_id'] ?? null;
        $outcome->description = $data['description'] ?? null;
        $outcome->updated_by = auth('api')->user()->id;
            
        $outcome->save();

        $data = [
            'success' => true,
            'data' => [
                'outcome' => $outcome
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outcome $outcome)
    {
        $outcome->delete();

        $data = [
             'success' => true,
             'data' => [
                    'outcome' => $outcome
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
