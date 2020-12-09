<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymentController;


class ClientProjectVisited extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientProjectVisited($id)
    {
        
        
        # code ...
        $id            =   PaymentController::decryptedId($id);
        $site_visit    =   DB::table('vw_onsite_visit')->where('pid', $id)->select('*');
        $getVisits     =   $site_visit->get();
        

        
        return view('client_portal.onsite_visit.multiple_visit', compact('getVisits'));
        
    }
}
