<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymentController;

class ClientStageOfCompletionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        # code ...

        $clientProject         =   DB::table('vw_my_projects')->where('user_id', Auth::id() )->select('*')->get();

        $stageOfCompletion     =   DB::table('vw_project_stage_completion')
                                                 ->where('clientid', Auth::user()->clientid)->select('*');

        $getStageOfCompletion  =   $stageOfCompletion->get();
        $getStage              =   $stageOfCompletion->first();

        
         if ( empty($getStage) ) {
             
             return view('client_portal.stage_of_completion.no_stage');
         }
         
         else {
             
            $stage_id       =   $getStage->stage_id;
           
            if ( ( count($getStageOfCompletion) === 1 ) ) {
    
                $singleProject             =   DB::table('vw_project_stage_completion')->where('stage_id', $stage_id )
                                                        ->select('*')->get()->toArray();
    
                $flattened_array           =   array_flatten($singleProject);
              
                return view('client_portal.stage_of_completion.profile', compact('singleProject', 'flattened_array'));
    
            }
    
            return view('client_portal.stage_of_completion.multiple_stage', compact('clientProject', 'getStageOfCompletion'));
             
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
        
        # code ...
        $id                    =   PaymentController::decryptedId($id);
        $stageInfo             =   DB::table('vw_project_stage_completion')->where('stage_id', $id )->select('*')->first();
        $singleProject         =   DB::table('vw_project_stage_completion')->where('stage_id', $id )->select('*')->get();
        $getImageOnVisit       =   DB::table('vw_project_stage_completion')->where('stage_id', $id )->select('img_name')->get();
        $flattened_array       =   array_flatten($singleProject);

        return view('client_portal.stage_of_completion.view', compact('singleProject', 'flattened_array', 'stageInfo') );

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
