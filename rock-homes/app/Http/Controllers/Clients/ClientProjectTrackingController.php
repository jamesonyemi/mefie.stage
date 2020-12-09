<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientProjectTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tracking       =   DB::table('vw_client_payment_tracker')->where('clientid', Auth::user()->clientid)->paginate(10);
        
        $data           =   ['total' => $tracking->total(), 'perPage' => $tracking->perPage(), 
                            'currentPage' => $tracking->currentPage()];
      
        return view('client_portal.tracking.show', compact('tracking', 'data'));
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
       
        
        $pid             =  Crypt::decrypt($id);
        $project         =  DB::table('tblproject')->select("*")->where('pid', $pid)->first();

        $projectDocs     =  DB::table('tblprojectdocs')->where('pid', $pid)->latest('created_date')->get();
        $tracking        =  DB::table('vw_onsite_visit')->where('pid', $pid)->latest('date_of_visit')->get();
        $payments        =  DB::table('tblpayment')->where('pid', $pid)->latest('paymentdate')->get();
        $project_stages  =  DB::table('vw_project_stage_completion')->where('pid', $pid)->latest('stage_entry_date')->get();
        
        // $data           =   ['total' => $tracking->total(), 'perPage' => $tracking->perPage(), 
        //                     'currentPage' => $tracking->currentPage()];
      
        return view('client_portal.tracking.index', compact('tracking', 'project', 'projectDocs', 'payments', 'project_stages'));

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
    
    public function projectTracking()
    {
        $tracking    =   DB::table('vw_project_stage_completion')->where('clientid', Auth::user()->clientid)->get();
         return $tracking->toJson();
    }
}
