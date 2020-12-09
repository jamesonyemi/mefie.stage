<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;


class ClientOnsiteVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        # code ...
        $projects           =   DB::table('vw_my_projects')->where('user_id', Auth::id() )->select('*');
        $retriveProjects    =   $projects->get();
        $site_visit         =   DB::table('vw_onsite_visit')->where('clientid', Auth::user()->clientid)->select('*');
        $getVisits          =   $site_visit->get();
        

        return view('client_portal.onsite_visit.client_projects', compact('getVisits', 'retriveProjects'));

        
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
        
        
        # code ...
        $id                    =   PaymentController::decryptedId($id);
        $singleProject         =   DB::table('vw_onsite_visit')->where('vid', $id )->select('*')->get();
        $flattened_array       =   array_flatten($singleProject);

        return view('client_portal.onsite_visit.view', compact('singleProject', 'flattened_array') );

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
}
