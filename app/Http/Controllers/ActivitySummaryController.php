<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CollectedData;
use App\Models\Project;

class ActivitySummaryController extends Controller
{
    public function index(Request $request) {
        if ($request->query('project_id') == "" || !$request->query('project_id') || 
        !$request->query('start_year') || !$request->query('end_year') || 
        !$request->query('start_quarters') || !$request->query('end_quarters')) {

            $data = [
                "error" => true,
            ];

            return response()->json($data, 400);
        }

        $parent_activities = Activity::whereNull('activity_id');
        $child_activities = Activity::whereNotNull('activity_id');
        $activities = [];

        $periods = [
            [
                "date" => 2022,
                "periods" => ['q1', "q2"]
            ],
            [
                "date" =>2023,
                "periods" => ['q1', "q2"]
            ]
        ];

        if ($request->query('start_year') && $request->query('end_year')) {
            $parent_activities = $parent_activities
            ->whereJsonContains('periods', [
                "date" => $request->query('start_year'),
                "quarters" => json_decode($request->query('start_quarters'))
            ])
            ->orWhereJsonContains('periods', [
                "date" => $request->query('end_year'),
                "quarters" => json_decode($request->query('end_quarters'))
            ]);

            $child_activities = $child_activities
            ->whereJsonContains('periods', [
                "date" => $request->query('start_year'),
                "quarters" => json_decode($request->query('start_quarters'))
            ])
            ->orWhereJsonContains('periods', [
                "date" => $request->query('end_year'),
                "quarters" => json_decode($request->query('end_quarters'))
            ]);
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
            "activities" => $parent_activities
        ];

        return view('activity_summary', $data);
    }
}
