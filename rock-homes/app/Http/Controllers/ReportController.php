<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $ongoing_project_count    =  DB::table('vw_count_ongoing_projects')->select('number_of_ongoing_project')->first();
        $completed_project_count  =  DB::table('vw_count_completed_projects')->select('number_of_completed_project')->first();
        $cancelled_project_count  =  DB::table('vw_count_cancelled_projects')->select('number_of_cancelled_project')->first();
        $stalled_project_count    =  DB::table('vw_count_stalled_projects')->select('number_of_stalled_project')->first();

        $ongoing_count            =  static::countSwitcher($ongoing_project_count->number_of_ongoing_project);
        $completed_count          =  static::countSwitcher($completed_project_count->number_of_completed_project);
        $cancelled_count          =  static::countSwitcher($cancelled_project_count->number_of_cancelled_project);
        $stalled_count            =  static::countSwitcher($stalled_project_count->number_of_stalled_project);

        return view('reports.index', compact('ongoing_count', 'completed_count', 
                                                'cancelled_count', 'stalled_count', 'completed_project_count' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  static function countSwitcher($value = '')
    {
        # code...

        $counter_value  = $value;

        switch ($counter_value) 
        {
           
            case ($counter_value <= 100):
                $counter_value;
             break;

            case( $counter_value >= 1000 ):
                number_format(($counter_value / 1000), 2) . 'K'; 
            break;    

           case( $counter_value >= 1000000):
                number_format(($counter_value / 1000000), 2) . 'M'; 
            break;
            default:

                break;
        }

        return  $counter_value;

        
    }
}
