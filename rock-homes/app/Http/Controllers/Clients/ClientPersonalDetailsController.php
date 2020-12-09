<?php

namespace App\Http\Controllers\Clients;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientPersonalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $all_clients              =   DB::table('all_client_info')->select('targeted_client_id', 'client_name', 'id')
                                                ->get()->toJson();

        $user                     =   DB::table('users')->where('role_id', Auth::user()->role_id )->select('*')->first();    
                                                
        $individual_clients       =   DB::table('vw_client_personal_details')->where('user_id', Auth::id() )
                                                ->select('*')->first();

        $corporate_clients        =   DB::table('vw_corporate_client_personal_details')->where('user_id', Auth::id() )
                                                ->select('*')->first();                            
            
               switch ( $user->role_id ) 
               {
                   
                   case config('app.individual_Client_RoleId'):
                       # code...
                       return view('client_portal.personal_details.index', compact('all_clients', 'individual_clients'));
                       break;
                   
                   case config('app.corporate_Client_RoleId'):
                      # code...
                      return view('client_portal.personal_details.corporate_client_details', compact('all_clients', 'corporate_clients'));
                      break;
                   default:
                       # code...
                       return 'Welcome to Rock Homes';
                       break;

               }


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
}
