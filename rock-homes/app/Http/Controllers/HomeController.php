<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ReportController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ongoing_project_count    =  DB::table('vw_count_ongoing_projects')->select('number_of_ongoing_project')->first();
        $completed_project_count  =  DB::table('vw_count_completed_projects')->select('number_of_completed_project')->first();
        $cancelled_project_count  =  DB::table('vw_count_cancelled_projects')->select('number_of_cancelled_project')->first();
        $stalled_project_count    =  DB::table('vw_count_stalled_projects')->select('number_of_stalled_project')->first();

        $ongoing_count            =  ReportController::countSwitcher($ongoing_project_count->number_of_ongoing_project);
        $completed_count          =  ReportController::countSwitcher($completed_project_count->number_of_completed_project);
        $cancelled_count          =  ReportController::countSwitcher($cancelled_project_count->number_of_cancelled_project);
        $stalled_count            =  ReportController::countSwitcher($stalled_project_count->number_of_stalled_project);

        return view('home', compact('ongoing_count', 'completed_count', 'cancelled_count', 
                                    'stalled_count', 'completed_project_count' ) );
    }
}
