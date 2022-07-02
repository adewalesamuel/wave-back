<?php
namespace App\Http\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Activity;
use App\Models\Indicator;

class ActivitySummaryExport implements FromView
{
    public function view(): View
    {

        if (!request()->query('project_id') || !request()->query('start_year') || 
        !request()->query('end_year') ) {

            throw new \Exception("Error Processing Request");
        }

        $parent_activities = Activity::whereNull('activity_id');
        $child_activities = Activity::whereNotNull('activity_id');
        $activities = [];


        if (request()->query('start_year') && request()->query('end_year')) {
            $parent_activities = $parent_activities->where('project_id', request()->query('project_id'))
            ->whereDate('start_date', ">=", date('Y-m-d', strtotime(request()->query('start_year') . "-01-01")))
            ->whereDate('end_date', "<=", date('Y-m-d', strtotime(request()->query('end_year') . "-12-31")));

            $child_activities = $child_activities->where('project_id', request()->query('project_id'))
            ->whereDate('start_date', ">=", date('Y-m-d', strtotime(request()->query('start_year') . "-01-01")))
            ->whereDate('end_date', "<=", date('Y-m-d', strtotime(request()->query('end_year') . "-12-31")));
        }
        
        $parent_activities = $parent_activities->orderBy('created_at', 'desc')->get();
        $child_activities = $child_activities->orderBy('created_at', 'desc')->get();

        $activities_indicators_ids = [];

        foreach ($parent_activities as $parent_activity) {
            if ($parent_activity->indicator_id) {
                $activities_indicators_ids[] = $parent_activity->indicator_id;
            }
        }

        foreach ($child_activities as $child_activity) {
            if ($child_activity->indicator_id) {
                $activities_indicators_ids[] = $child_activity->indicator_id;
            }
        }
            
        $indicators = Indicator::whereIn('id', $activities_indicators_ids)->with('collected_data')->get();

        foreach ($indicators as $indicator) {
            $achieved = $indicator->collected_data->reduce(function($carry, $collected_data) {
                return $carry + intval($collected_data->values);
            });
            $indicator['achieved'] = $achieved;
        }

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

        foreach ($activities as $activitiy) {
            foreach ($indicators as $indicator) {
                if ($activitiy->indicator_id == $indicator->id ) {
                    $activitiy["indicator"] = $indicator;
                }
            }

            foreach ($activitiy['children'] as $child_activitiy) {
                foreach ($indicators as $indicator) {
                    if ($child_activitiy->indicator_id == $indicator->id ) {
                        $child_activitiy["indicator"] = $indicator;
                    }
                }
            }
        }

        $data = [
            'activities' => $parent_activities,
            'start_year' => request()->query('start_year'),
            'end_year' => request()->query('end_year')
        ];

        return view('activity_summary', $data); 
    }
}
