<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CollectedData;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Exports\ActivitySummaryExport;

class ActivitySummaryController extends Controller
{
    
    public function index(Request $request) {
        return Excel::download(new ActivitySummaryExport, 'activity-summary.xlsx');
    }
}
