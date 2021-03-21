<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UtilityController extends Controller
{
    public static function showProjectByStatus()
    {
        # code...
        $projects  = DB::table('tblproject as a')
        ->join("tblprojectimage as d", "d.pid", "=", "a.pid" )
        ->join('tblstatus as b', 'b.id','=', 'a.statusid')
        // ->join('tbltown', 'tbltown.tid', '=', 'a.tid')
        // ->join('tblregion', 'tblregion.rid', '=', 'a.rid')
        // ->where('a.active', '=', 'yes')
        // ->orderBy('a.pid')
        // ->groupBy('a.pid')
        // ->where("a.clientid", Auth::user()->clientid )
        // ->where("a.clientid", "<>", null )
        ->where('b.status', 'completed' )
        ->get()->toArray();

        $data = $projects;

        return view('reports.completed_projects', compact("data") );


    }
}
