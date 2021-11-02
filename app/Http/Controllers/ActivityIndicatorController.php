<?php

namespace App\Http\Controllers;

use App\Models\ActivityIndicator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityIndicator as StoreActivityIndicatorRequest;

class ActivityIndicatorController extends Controller
{
    public function store(StoreActivityIndicatorRequest $request) {
        $data = $request->validated();

        if (ActivityIndicator::where('activity_id', $data['activity_id'])->where('indicator_id', $data['indicator_id'])->exists())
            throw new \Exception("The activity indicator already exist", 1);
            
        $activity_indicator = new ActivityIndicator;
        
        $activity_indicator->activity_id = $data['activity_id'] ?? null;
        $activity_indicator->indicator_id = $data['indicator_id'] ?? null;
        $activity_indicator->created_by = auth('api')->user()->id;
            
        $activity_indicator->save();

        $data = [
            'success' => true,
            'data' => [
                'activity_indicator' => [
                    'id' => $activity_indicator->id,
                    'activity_id' => $activity_indicator->activity_id,
                    'created_by' => $activity_indicator->created_by,
                    'indicator' => $activity_indicator->indicator
                    ]
                ]
            ];

        return response()->json($data, 200);
    }

    public function destroy(ActivityIndicator $activity_indicator) {
        $activity_indicator->delete();

        $data = [
             'success' => true,
             'data' => [
                    'activity_indicator' => $activity_indicator
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
