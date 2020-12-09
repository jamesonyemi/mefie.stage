<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymentController;


class ClientPaymentBreakDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $client_payments        =   DB::table('vw_client_payment_tracker')->where('clientid', Auth::user()->clientid)
                                        ->paginate(15);

        $payments               =   DB::table('vw_client_payment_tracking')->where('clientid', Auth::user()->clientid)
                                        ->get()->toArray();

        $get_project_name       =   DB::table('vw_client_payment_tracking')->where('clientid', Auth::user()->clientid)
                                        ->select("title", "amt_received")->first();

        $client_total_payment   =   DB::table('vw_client_total_payment')->where('clientid', Auth::user()->clientid)
                                        ->select("grand_total_payment")->first();

        $data                   =   [  'total' => $client_payments->total(), 'perPage' => $client_payments->perPage(), 
                                    'currentPage' => $client_payments->currentPage() ];
                           
      
        return view('client_portal.payments.index', compact('payments', 'client_payments', 'get_project_name', 
                                                            'client_total_payment', 'data') );

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
        # code...
        $pid                    =   PaymentController::decryptedId($id);
        $payments               =   DB::table('vw_client_payment_tracking')->where('pid', $pid )->get()->toArray();

        $get_project_name       =   DB::table('vw_client_payment_tracker')->where('pid', $pid)
                                        ->select("*")->first();

        $client_total_payment   =   DB::table('vw_client_total_payment')->where('pid', $pid)    
                                        ->select("grand_total_payment")->first();
                           
      
        return view('client_portal.payments.show', compact('payments', 'get_project_name', 
                                                            'client_total_payment') );
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
