<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;

trait ProjectCounterTrait
{
    
    public static function projectCounter($view_name = "home")
    {
        
        # code...;
        $get_client_project    =  DB::table('tblproject')
        ->join('users', 'users.clientid', '=', 'tblproject.clientid')
        ->where('users.created_by_tenant_id', session()->get('tenant_id') );
        // ->where('users.tenant_id', session()->get('tenant_id') );

        $project_count = $get_client_project->select( DB::raw('count(tblproject.pid) as project_counter') );

        
        
        $get_client_completed_project   =   ReportController::project(config("app.completed_status_text"));
        $get_client_ongoing_project     =   ReportController::project(config("app.ongoing_status_text"));
        $get_client_cancelled_project   =   ReportController::project(config("app.cancelled_status_text"));
        $get_client_stalled_project     =   ReportController::project(config("app.stalled_status_text"));
        
        $ongoing_count                  =   ReportController::countSwitcher(count($get_client_ongoing_project) );
        $completed_count                =   ReportController::countSwitcher(count($get_client_completed_project) );
        $cancelled_count                =   ReportController::countSwitcher(count($get_client_cancelled_project) );
        $stalled_count                  =   ReportController::countSwitcher(count($get_client_stalled_project) );

        return view($view_name, compact('ongoing_count', 'completed_count', 'cancelled_count', 'project_count',
                    'stalled_count',  'get_client_completed_project', 
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
        ->where("c.clientid", session()->get("tenant_id") )
        // ->where('tblproject.active', '=', 'yes')
        // ->where("c.clientid", session()->get("tenant_id") )
        // ->where("c.tenant_id", "<>", null )
        ->get()->toArray();

            return $projects;

    }


}