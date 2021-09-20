<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\CollectedData;
use App\Models\IndicatorDisaggregation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIndicator as StoreIndicatorRequest;
use App\Http\Requests\UpdateIndicator as UpdateIndicatorRequest;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators = Indicator::with('activity')->orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'indicators' => $indicators
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disaggregations(Request $request, Indicator $indicator)
    {
        $disaggregations = IndicatorDisaggregation::with('disaggregation')
        ->where('indicator_id', $indicator->id)->orderBy('created_at', 'desc')->get();

        $data = [
            'success' => true,
            'data' => [
                'indicator_disaggregations' => $disaggregations
                ]
            ];

        return response()->json($data, 200);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collected_data(Request $request, Indicator $indicator)
    {
        $data = [
            'success' => true,
            'data' => [
                'indicator_collected_data' => $indicator->collected_data->SortByDesc('created_at')
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
    public function store(StoreIndicatorRequest $request)
    {
        $data = $request->validated();

        $indicator = new Indicator;
        
        $indicator->name = $data['name'];
        $indicator->description = $data['description'] ?? null;
        $indicator->type = $data['type'] ?? 'number';
        $indicator->direction = $data['direction'] ?? 'increasing';
        $indicator->baseline = $data['baseline'] ?? null;
        $indicator->target = $data['target'] ?? null;
        $indicator->unit = $data['unit'] ?? null;
        $indicator->activity_id = $data['activity_id'];
        $indicator->created_by = auth('api')->user()->id;
            
        $indicator->save();

        $data = [
            'success' => true,
            'data' => [
                'indicator' => $indicator
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function show(Indicator $indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicator $indicator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndicatorRequest $request, Indicator $indicator)
    {
        $data = $request->validated();
        
        $indicator->name = $data['name'];
        $indicator->description = $data['description'] ?? null;
        $indicator->type = $data['type'] ?? 'number';
        $indicator->direction = $data['direction'] ?? 'increasing';
        $indicator->baseline = $data['baseline'] ?? null;
        $indicator->target = $data['target'] ?? null;
        $indicator->unit = $data['unit'] ?? null;
        $indicator->activity_id = $data['activity_id'];
        $indicator->updated_by = auth('api')->user()->id;
            
        $indicator->save();

        $data = [
            'success' => true,
            'data' => [
                'indicator' => $indicator
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicator $indicator)
    {  
        $indicator->delete();

        $data = [
             'success' => true,
             'data' => [
                    'indicator' => $indicator
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
