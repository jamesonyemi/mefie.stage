<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ProjectCounterTrait;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    use ProjectCounterTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return static::projectCounter();

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

    public  static function countSwitcher($value = '', $status = '')
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

    public static function project(string $status_type)
    {
        # code...
        $projects  = DB::table('tblprojectimage as a')
        ->join("tblproject as c", "c.pid", "=", "a.pid" )
        ->join('users', 'users.clientid', '=', 'c.clientid')
        ->join('tblstatus as b', 'b.id','=', 'a.status_id')
        ->join('tbltown', 'tbltown.tid', '=', 'c.tid')
        ->join('tblregion', 'tblregion.rid', '=', 'c.rid')
        ->orderBy('a.pid')
        ->where('b.status', '=', $status_type)
        ->where('c.active', '=', 'yes')
        ->where("c.clientid", Auth::user()->clientid )
        ->where("c.clientid", "<>", null )
        ->get()->toArray();

        return $projects;
        

    }
    
}
