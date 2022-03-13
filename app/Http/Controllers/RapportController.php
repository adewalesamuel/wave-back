<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CollectedData;
use App\Models\Project;

class ActivityReportController extends Controller
{
    public function index(Request $request) {

        if ($request->query('project_id') == "" || !$request->query('project_id')) {

            $data = [
                "error" => true,
                "message" => "You must specify a project"
            ];

            return response()->json($data, 400);
        }

        $parent_activities = Activity::whereNull('activity_id');
        $child_activities = Activity::whereNotNull('activity_id');
        $activities = [];

        if ($request->query('start_date') && $request->query('end_date')) {
            $parent_activities = $parent_activities->where('start_date', $request->query('start_date'));
            $child_activities = $child_activities->where('end_date', $request->query('end_date'));
        }
        
        $parent_activities = $parent_activities->orderBy('created_at', 'desc')->get();
        $child_activities = $child_activities->orderBy('created_at', 'desc')->get();

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
            "success" => true,
            "activities" => $parent_activities
        ];

        return response()->json($data, 200, $headers);
        
    }
}
