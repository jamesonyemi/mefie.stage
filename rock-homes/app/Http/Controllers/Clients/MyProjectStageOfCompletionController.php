<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymentController;

class MyProjectStageOfCompletionController extends Controller
{
    //
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ProjectPhase($id)
    {
        
        
        # code ...
        $id                     =   PaymentController::decryptedId($id);

        $clientProject          =   DB::table('vw_my_projects')->where('pid', $id)->select('*');
        
        $stage_of_completion    =   DB::table('vw_project_stage_completion')->where('pid', $id)->select('*');

        $get_project_name       =   $clientProject->first();
        $getStageOfCompletion   =   $stage_of_completion->get();
        

        
        return view('client_portal.stage_of_completion.my_stage_of_completion', compact('getStageOfCompletion', 'get_project_name'));
        
    }
}
