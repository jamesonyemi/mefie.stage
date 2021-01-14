<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $projects              =   DB::table('vw_my_projects')->where('user_id', Auth::id() )->select('*');
        $retriveProjects       =   $projects->get();
        $getProjectByUserId    =   $projects->first();
        
        if ( empty($getProjectByUserId) ) {
             
             return view('client_portal.my_projects.no_project');
         }
         
        else {
            
            $pid   =   $getProjectByUserId->pid;
            $singleProject      =   DB::table('vw_my_projects')->where('pid', $pid )->select('*')->first();
            $projectImage       =   DB::table('users')->where('id', Auth::id() )->select('clientid')->first();
            $clientId           =   $projectImage->clientid;
    
            $projectImage       =   DB::table('tblprojectimage')->where('clientid', $clientId)->where('pid', $pid)
                                                  ->where('status_id', config('app.ongoing_status') )->select('*');
           
            $image              =   $projectImage->pluck('img_name');
            $payments           =   DB::table('tblpayment')->where('clientid', $clientId)->where('pid', $pid)
                                            ->select('amt_received','paymentdate','comments')->get();
    
            $pay                =   $payments->sum('amt_received');
            
             if ( empty($getProjectByUserId) ) {
                 
                 return view('client_portal.my_projects.no_project');
             }
             else {
                 
                return view('client_portal.my_projects.multiple_projects', compact('retriveProjects'));
                 
             }
         
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
        
        $id                 =   PaymentController::decryptedId($id);
        $projects           =   DB::table('vw_my_projects')->where('pid', $id )->select('*')->first();
        $trackerPayment     =   DB::table('vw_client_payment_tracker')->where('pid', $id )->select('*')->first();
        $projectImage       =   DB::table('users')->where('id', Auth::id() )->select('clientid')->first();

        $clientId           =   $projectImage->clientid;
        $projectImage       =   DB::table('tblprojectimage')->where('clientid', $clientId)->where('pid', $id)
                                            ->where('status_id', config('app.ongoing_status') )->select('*');

        $image              =   $projectImage->pluck('img_name');
        $payments           =   DB::table('tblpayment')->where('clientid', $clientId)->where('pid', $id)
                                                   ->select('amt_received','paymentdate','comments')->get();

        $pay                =   $payments->sum('amt_received');
        $estimatedBudget    =   $trackerPayment->estimated_budget;
        $budgetStatus       =   static::budgetAnalysis($estimatedBudget, $pay);
        
        return view('client_portal.my_projects.show', compact('projects','pay','payments','image', 'trackerPayment', 'estimatedBudget', 'budgetStatus') );

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

    public static function clientWithSingleProject($id)
    {
        
        $id             =   PaymentController::decryptedId($id);
        $projects       =   DB::table('vw_my_projects')->where('pid', $id )->select('*')->first();
        $projectImage   =   DB::table('users')->where('id', Auth::id() )->select('clientid')->first();
        $clientId       =   $projectImage->clientid;
        $projectImage   =   DB::table('tblprojectimage')->where('clientid', $clientId)->where('pid', $id)->where('status_id', '2')->select('*');
        $image          =   $projectImage->pluck('img_name');
        $payments       =   DB::table('tblpayment')->where('clientid', $clientId)->where('pid', $id)->select('amt_received','paymentdate','comments')->get();
        $pay            =   $payments->sum('amt_received');

        return view('client_portal.my_projects.single_project', compact('projects','pay','payments','image') );

    }

    public static  function truncate($text, $chars = 120) 
    {
        if(strlen($text) > $chars) {
            $text = $text.' ';
            $text = substr($text, 0, $chars);
            $text = substr($text, 0, strrpos($text ,' '));
            $text = $text.'...';
        }
        return $text;
    }  

    public static function budgetAnalysis($estimated_budget, $total_amt_spent, $currency_symbol = "GH₵")
    {
        
        
        $percentage           =   100;
        $budgetDiff           =   ( $estimated_budget) - ($total_amt_spent);
        
        $isBudgetInSurplus    =   ( $estimated_budget > $total_amt_spent );
        $isBudgetInDeficit    =   ( $estimated_budget < $total_amt_spent );
        $isBudgetBalanced     =   ( $estimated_budget == $total_amt_spent );
        
        $projectBudgetIndicator    =   [
            
            "surplus_budget" => [
                "computed_difference" => $budgetDiff,
                "flag_color" => "text-success",
                "budget_indicator" => ucfirst(config('app.surplus_budget')),
            ],
            
            "deficit_budget" => [
                "computed_difference" => $budgetDiff,
                "flag_color" => "text-danger",
                "budget_indicator" => ucfirst(config('app.deficit_budget')),
            ],
            
            "balanced_budget" => [
                "computed_difference" => $budgetDiff,
                "flag_color" => "text-info",
                "budget_indicator" => ucfirst(config('app.balanced_budget')),
            ],
        ];
        
        if ( $isBudgetInSurplus ) {
            
            # code...
            $surplusBudgetInfo  =  '<span class="text '.$projectBudgetIndicator['surplus_budget']['flag_color'].'" 
                            style="font-size: 1rem; ">'.
                                '<i class="bx bx-up-arrow-alt"></i>'.
                                        $projectBudgetIndicator['surplus_budget']['budget_indicator'] . ' ' .
                                    '<small class="bx bx-transfer-alt"></small>'.
                                    ' differential: ' . "<em class='mx-1' id='client-budget-status'>$currency_symbol</em>" .''.     number_format($projectBudgetIndicator['surplus_budget']['computed_difference'], 2);
                            '</span>';

            return $surplusBudgetInfo; 

        } elseif ( $isBudgetInDeficit ) {
            
            # code...
            $deficitBudgetInfo  =   '<span class="text '.$projectBudgetIndicator['deficit_budget']['flag_color'].'" 
                                style="font-size: 1rem; ">'.
                                '<i class="bx bx-down-arrow-alt"></i>'.
                                    $projectBudgetIndicator['deficit_budget']['budget_indicator'] . ' ' . 
                                    '<small class="bx bx-transfer-alt"></small>'.
                                    ' differential: ' . "<em class='mx-1'>$currency_symbol</em>" .''. 
                                        number_format($projectBudgetIndicator['deficit_budget']['computed_difference'], 2);
                            '</span>';

            return $deficitBudgetInfo; 


        }  else {
            
            # code...
            return  
            '<span class="text '.$projectBudgetIndicator['balanced_budget']['flag_color'].'" 
            style="font-size: 1rem; ">'.
            '<i class="bx bx-down-arrow-alt"></i>'.
                $projectBudgetIndicator['balanced_budget']['budget_indicator'] . ' ' . 
                '<small class="bx bx-transfer-alt"></small>'.
                ' differential: ' . "<em class='mx-1'>$currency_symbol</em>" .''. 
                    number_format($projectBudgetIndicator['balanced_budget']['computed_difference'], 2);
            '</span>';


        }
    }
     
}
