<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ReportController;

trait ProjectCounterTrait
{
    
    public static function projectCounter($view_name)
    {
        
        # code...
        $project_count    =  DB::table('tblproject')
        ->join('users', 'users.clientid', '=', 'tblproject.clientid')
        ->whereIn('users.tenant_id', [  session()->get('tenant_id')])
        ->select( DB::raw('count(users.tenant_id) as project_counter') );

        $ongoing_project_count    =  $project_count->where('tblproject.statusid', config('app.ongoing_status') )->first();
        $completed_project_count  =  $project_count->where('tblproject.statusid', config('app.completed_status') )->first();
        $cancelled_project_count  =  $project_count->where('tblproject.statusid', config('app.cancelled_status') )->first(); 
        $stalled_project_count    =  $project_count->where('tblproject.statusid', config('app.stalled_status') )->first(); 

        $ongoing_count            =  ReportController::countSwitcher($ongoing_project_count->project_counter );
        $completed_count          =  ReportController::countSwitcher($completed_project_count->project_counter );
        $cancelled_count          =  ReportController::countSwitcher($cancelled_project_count->project_counter );
        $stalled_count            =  ReportController::countSwitcher($stalled_project_count->project_counter );

        return view($view_name, compact('ongoing_count', 'completed_count', 'cancelled_count', 'project_count',
                                    'stalled_count', 'completed_project_count' ) );

    }
}