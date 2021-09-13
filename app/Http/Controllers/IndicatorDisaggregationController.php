<?php

namespace App\Http\Controllers;

use App\Models\IndicatorDisaggregation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIndicatorDisaggregation as StoreIndicatorDisaggregationRequest;

class IndicatorDisaggregationController extends Controller
{
    public function store(StoreIndicatorDisaggregationRequest $request) {
        $data = $request->validated();

        $indicator_disaggregation = new IndicatorDisaggregation;
        
        $indicator_disaggregation->indicator_id = $data['indicator_id'] ?? null;
        $indicator_disaggregation->disaggregation_id = $data['disaggregation_id'] ?? null;
        $indicator_disaggregation->created_by = auth('api')->user()->id;
            
        $indicator_disaggregation->save();

        $data = [
            'success' => true,
            'data' => [
                'indicator_disaggregation' => $indicator_disaggregation
                ]
            ];

        return response()->json($data, 200);
    }

    public function destroy(IndicatorDisaggregation $indicator_disaggregation) {
        $indicator_disaggregation->delete();

        $data = [
             'success' => true,
             'data' => [
                    'indicator_disaggregation' => $indicator_disaggregation
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
