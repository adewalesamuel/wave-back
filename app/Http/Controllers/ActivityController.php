<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Indicator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActivity as StoreActivityRequest;
use App\Http\Requests\UpdateActivity as UpdateActivityRequest;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $parent_activities = Activity::whereNull('activity_id')->with('indicator')->orderBy('created_at', 'desc')->get();
        $child_activities = Activity::whereNotNull('activity_id')->with('indicator')->orderBy('created_at', 'desc')->get();
        $activities = [];

        foreach ($parent_activities as $key => $value) {
            $parent_activity = $value;
            $children = [];

            foreach ($child_activities as $key => $value) {
                $child_activity = $value;
                if ($parent_activity['id'] === $child_activity['activity_id']) {
                    $children[] = $child_activity;
                }
            }

            $parent_activity['children'] = $children;       
            $activities[] = $parent_activity;
        };
        

        $data = [
            'success' => true,
            'data' => [
                'activities' => $activities
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indicator(Request $request, Activity $activity)
    {   
        $data = [
            'success' => true,
            'data' => [
                'indicators' => $activity->indicator
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
    public function store(StoreActivityRequest $request)
    {
        $data = $request->validated();

        $activity = new Activity;
        
        $activity->name = $data['name'];
        $activity->description = $data['description'] ?? null;
        $activity->status = $data['status'] ?? 'open';
        $activity->start_date = $data['start_date'];
        $activity->end_date = $data['end_date'];
        $activity->budget = $data['budget'] ?? null;
        $activity->amount_spent = $data['amount_spent'] ?? null;
        $activity->user_id = $data['user_id'] ?? null;
        $activity->project_id = $data['project_id'];
        $activity->activity_id = $request->activity_id ?? null;
        $activity->created_by = auth('api')->user()->id;
        
        $activity->save();

        $data = [
            'success' => true,
            'data' => [
                'activity' => $activity
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $data = [
            'success' => true,
            'data' => [
                'activity' => $activity
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $data = $request->validated();
        
        $activity->name = $data['name'];
        $activity->description = $data['description'] ?? null;
        $activity->status = $data['status'] ?? 'open';
        $activity->start_date = $data['start_date'];
        $activity->end_date = $data['end_date'];
        $activity->budget = $data['budget'] ?? null;
        $activity->amount_spent = $data['amount_spent'] ?? null;
        $activity->user_id = $data['user_id'] ?? null;
        $activity->project_id = $data['project_id'];
        $activity->activity_id = $data['activity_id'] ?? null;
        $activity->updated_by = auth('api')->user()->id;
        
        $activity->save();

        $data = [
            'success' => true,
            'data' => [
                'activity' => $activity
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        $data = [
             'success' => true,
             'data' => [
                    'activity' => $activity
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
