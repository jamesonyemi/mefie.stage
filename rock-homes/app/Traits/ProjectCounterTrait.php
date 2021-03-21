<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;

trait ProjectCounterTrait
{
    
    public static function projectCounter($view_name)
    {
        
        # code...;
        $get_client_project    =  DB::table('tblproject')
        ->join('all_client_info', 'all_client_info.id', '=', 'tblproject.clientid')
        ->where('all_client_info.created_by_tenant_id', session()->get('tenant_id') );

        $project_count = $get_client_project->select( DB::raw('count(tblproject.pid) as project_counter') );

        $ongoing_project_count    =  $project_count->where('tblproject.statusid', config('app.ongoing_status') )->first();
        $completed_project_count  =  $project_count->where('tblproject.statusid', config('app.completed_status') )->first();
        $cancelled_project_count  =  $project_count->where('tblproject.statusid', config('app.cancelled_status') )->first(); 
        $stalled_project_count    =  $project_count->where('tblproject.statusid', config('app.stalled_status') )->first(); 

        $ongoing_count            =  ReportController::countSwitcher($ongoing_project_count->project_counter );
        $completed_count          =  ReportController::countSwitcher($completed_project_count->project_counter );
        $cancelled_count          =  ReportController::countSwitcher($cancelled_project_count->project_counter );
        $stalled_count            =  ReportController::countSwitcher($stalled_project_count->project_counter );

        $get_client_completed_project   =   static::project(config("app.completed_status_text"));
        $get_client_ongoing_project     =   static::project(config("app.ongoing_status_text"));
        $get_client_cancelled_project   =   static::project(config("app.cancelled_status_text"));
        $get_client_stalled_project     =   static::project(config("app.stalled_status_text"));

        return view($view_name, compact('ongoing_count', 'completed_count', 'cancelled_count', 'project_count',
                    'stalled_count', 'completed_project_count', 'get_client_completed_project', 
                    'get_client_ongoing_project', 'get_client_cancelled_project', 'get_client_stalled_project' ) );

    }

    public static function projectInView()  
    {
        # code...
        $projects  = DB::table('users as c')
        ->join("tblprojectimage as d", "d.clientid", "=", "c.clientid" )
        ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
        ->join('tblstatus', 'tblstatus.id','=', 'd.status_id')
        ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
        ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id', 
                    'tbltown.town as location', 'tblproject.title as project_title', 'd.img_name', 'tblproject.isdeleted as flag_as_deleted', 'tblproject.pid','all_client_info.client_name  as full_name',   
                    'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
        ->orderBy('tblproject.pid')
        ->where('tblproject.active', '=', 'yes')
        ->where("c.tenant_id", session()->get("tenant_id") )
        ->where("c.tenant_id", "<>", null )
        ->get()->toArray();

            return $projects;

    }

    public static function project(string $status_type)
    {
        # code...
        $projects  = DB::table('tblprojectimage as a')
        ->join("tblproject as c", "c.pid", "=", "a.pid" )
        ->join('all_client_info', 'all_client_info.id', '=', 'c.clientid')
        ->join('tblstatus as b', 'b.id','=', 'a.status_id')
        ->join('tbltown', 'tbltown.tid', '=', 'c.tid')
        ->join('tblregion', 'tblregion.rid', '=', 'c.rid')
        ->orderBy('a.pid')
        ->where('b.status', '=', $status_type)
        ->where('all_client_info.created_by_tenant_id', session()->get('tenant_id') )
        ->where('all_client_info.created_by_tenant_id', '<>', null )
        ->get()->toArray();

        return $projects;

    }


    


}