<?php
namespace App\Http\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Activity;

class ActivitySummaryExport implements FromView
{
    public function view(): View
    {

        if (!request()->query('project_id') || !request()->query('start_year') || 
        !request()->query('end_year') ) {

            $data = [
                "error" => true,
            ];

            return response()->json($data, 400);
        }

        $parent_activities = Activity::whereNull('activity_id');
        $child_activities = Activity::whereNotNull('activity_id');
        $activities = [];

        if (request()->query('start_year') && request()->query('end_year')) {
            $parent_activities = $parent_activities
            ->whereDate('start_date', ">=", date('Y-m-d', strtotime(request()->query('start_year') . "-01-01")))
            ->whereDate('end_date', "<=", date('Y-m-d', strtotime(request()->query('end_year') . "-12-31")));

            $child_activities = $child_activities
            ->whereDate('start_date', ">=", date('Y-m-d', strtotime(request()->query('start_year') . "-01-01")))
            ->whereDate('end_date', "<=", date('Y-m-d', strtotime(request()->query('end_year') . "-12-31")));
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
            'activities' => $parent_activities,
            'start_year' => request()->query('start_year'),
            'end_year' => request()->query('end_year')
        ];

        return view('activity_summary', $data);
    }
}
