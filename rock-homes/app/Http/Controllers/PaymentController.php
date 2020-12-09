<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
    public static $targetTable = 'tbltotalbalances';

    public function __construct() {
         static::$targetTable;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $regions         =   DB::table('tblregion')->pluck('rid', 'region');
       $project_status  =   DB::table('tblstatus')->get()->pluck('id', 'status');
       $all_clients     =   DB::table('tblclients')->get();
       $users           =   DB::table('users')->get();
       $payments        =   DB::table("vw_group_projectdocs_by_clientid");
       $project         =   DB::table("tblproject");
       $clients         =   $payments->get();
       $get_project     =   $project->get();

       $clientWithProjects = ClientController::clientWithProjects();


       return view('payments.index', compact('clients', 'regions', 'users', 'project_status', 'all_clients', 'clientWithProjects', 'get_project'));
    }
    
    public function costOfProjectAtEveryStage() 
    {
        
        $project_stage  =  DB::table('vw_track_client_payment_by_stage')->latest('paymentdate')->get();
        $roles          =  DB::table('tblrole')->pluck('id', 'type');
        $all_clients    =  DB::table('vw_client_made_payment')->get();
        $stages         =  DB::table('tblproject_phase')->pluck('id', 'phase');
        
        return view('payments.view_cost_of_project_by_stage', compact('project_stage', 'roles', 'all_clients', 'stages'));
        
    }
    
    public function paymentPerStageOfCompletion($incoming_project_id, $incoming_client_id, $incoming_project_phase_id) 
    {
        
        $decrypt_incoming_project_id = static::decryptedId($incoming_project_id);
        
        $decrypt_incoming_project_phase_id  = static::decryptedId($incoming_project_phase_id);
        
        $decrypt_incoming_client_id = static::decryptedId($incoming_client_id);
        
        $payment_per_stage  =  DB::table('vw_track_client_payment')->latest('paymentdate')->where("pid", $decrypt_incoming_project_id)
        ->orWhere('phase_id', $decrypt_incoming_project_phase_id)
        ->where("clientid", $decrypt_incoming_client_id)->get();
        
        $total_amount_received =  DB::table("vw_track_client_payment")->select(DB::raw('sum(amt_received) as total_cost, client_name, phase'))
        ->where("pid", $decrypt_incoming_project_id)
        ->where('phase_id', $decrypt_incoming_project_phase_id)
        ->where("clientid", $decrypt_incoming_client_id)->first();
        
        return view('payments.view_payment_by_stage', compact('payment_per_stage', 'total_amount_received'));
        
    }
    
    public function printPayment() 
    {
        
        $print_payment  =  DB::table('vw_track_client_payment_by_stage')->latest('paymentdate')->get();
        $roles          =  DB::table('tblrole')->pluck('id', 'type');
        $all_clients    =  DB::table('vw_client_made_payment')->get();
        $stages         =  DB::table('tblproject_phase')->pluck('id', 'phase');
        
        return view('payments.print_payment', compact('print_payment', 'roles', 'all_clients', 'stages'));
        
    }
    
    public function computeTotalCostOfProjectByProjectId($pid)
    {
        
        $clientProject =  DB::table("vw_track_client_payment_by_stage")->select(DB::raw('sum(amt_received) as total_cost'))
        ->where("pid", $pid)->first();
        return json_encode($clientProject);
    }
    
    public function computeTotalCostOfProjectByPhase($project_id, $project_phase_id)
    {
        
        $compute_cost =  DB::table("vw_track_client_payment_by_stage")->select(DB::raw('sum(amt_received) as total_cost'))->where('pid', $project_id)
        ->where("phase", "like", "%" . $project_phase_id . "%")->first();
        return json_encode($compute_cost);
    }
    
    public function projectOwner($clientid)
    {
        
        $project_owner =  DB::table("vw_track_client_payment_by_stage")
       ->where('clientid', $clientid)->first();
       
        if ( empty($project_owner) ){
            return json_encode($clientid);
        }
        
        return json_encode($project_owner);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $paymode        =  DB::table('tblpaymentmode')->where('active','=', 'yes')->pluck('mode', 'mode');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients    =  DB::table('all_client_info')->get();
        $payments       =  DB::table("tblpayment");
        $stages         =  DB::table('tblproject_phase')->pluck('id', 'phase');
        $get_payments   =  $payments->get();

        return view('payments.create', compact('get_payments', 'paymode', 'regions', 'project_status', 'all_clients', 'stages' ));

    }

    public function client($id)
    {
        $clients =  DB::table("all_client_info")->where("targeted_client_id", $id)->pluck("client_name","id");
        return json_encode($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $isProjectId      =  $request->Input('pid');
       $amt_received     =  $request->input('amt_received');
       $stage_id         =  $request->Input('stage_id');
       $targetTable      =  static::$targetTable;

       $getProjectId     =  DB::table('tblproject')->where('pid',  $isProjectId)->get();
       $projectId        =  $getProjectId[0]->pid;
       $totalcost        =  $getProjectId[0]->totalcost;
       $createdBy        =  Auth::id();

       $conditon         =  [ 'projectid' => $isProjectId ];
       $data             =  [ 'projectid' => $projectId, 'initial_totalcost' => $totalcost,
                              'total_payment_made' => $amt_received,'created_by' => $createdBy, ];
       $postData         =  ClientController::allExcept();
       $newPayment       =  DB::table('tblpayment')->insertGetId(array_merge( $postData,[ 'receivedby' => $createdBy, 'stage_id' => $stage_id] ));

       $lastPaymentMade  =  DB::table('tblpayment')->where('id',  $newPayment)->get()->pluck('amt_received')->first();
       $amtReceived      =  ['total_payment_made' => $lastPaymentMade ];
       $pid              =  DB::table('tblpayment')->where('id',  $newPayment)->get()->pluck('pid')->first();
       $findId           =  DB::table($targetTable)->where('projectid', $pid )->get()->first();
       $projectIdExist   =  $findId;
       $isNull           =  is_null($projectIdExist);

       if ( ($isNull) )
       {
           $firstPaymentMade = static::totalBalances($targetTable, $conditon, array_merge($data, $amtReceived));
       }
       else
       {
           $keyExist         =  array_key_exists( "total_payment_made", [ "total_payment_made" => $projectIdExist->total_payment_made]) && !empty( $lastPaymentMade );
           $computeBudget    =  round($projectIdExist->total_payment_made, 2) + round($lastPaymentMade, 2);
           $newTotalComputed =  ['total_payment_made' => $computeBudget ];

           if ( ($keyExist) )
            {
                $totalPaymentMade = static::totalBalances($targetTable, $conditon, array_merge($data, $newTotalComputed));
            }


        }
        return redirect()->route('payments.index')->with('success', 'Payment #  ' .$newPayment. ' Recorded Sucessfully');

    }

    public static function totalBalances($table = '', $conditon = [], $arrayValue = [])
    {

        $processBalance = DB::table($table)->updateOrInsert($conditon, $arrayValue);
        return $processBalance;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $id              =   static::decryptedId($id);
       $regions         =   DB::table('tblregion')->pluck('rid', 'region');
       $project_status  =   DB::table('tblstatus')->get()->pluck('id', 'status');
       $paymode         =   DB::table('tblpaymentmode')->pluck('mode', 'mode');
       $payments        =   DB::table("tblpayment");
       $get_payments    =   $payments->where('pid', $id)->get();
       $get_project     =   DB::table('vw_my_projects')->where('pid', $id)->select('title')->first();
       
       $project_id      =   $payments->select('pid')->first();
       $project_info    =   DB::table('tblproject')->select("*")->where('pid', $id)->get();

       $client_id       =   $project_info->first();
       $client_info     =   DB::table('all_client_info')->select("*")->where('id', $client_id->clientid)->get();
      

       return view('payments.payment_list', compact('get_payments', 'get_project', 'regions', 'paymode', 'project_status', 'client_info', 'project_info'));

    }
    
    public function trackClientProjects($id)
    {
        # code...
        $client_id      =  PaymentController::decryptedId($id);
        $track_payment  =  DB::table('vw_client_payment_tracker')->where('clientid', $client_id);
        $projectOwners  =  $track_payment->get();
        $clientId       =  $track_payment->select('clientid')->first();
        $client_info    =  DB::table('all_client_info')->where('id', $clientId->clientid)->select('client_name')->first();
            

        return view('payments.project_owned_by_client', compact('projectOwners', 'client_info') );

    }
    
    public function trackPaymentList($id, $payment_id)
    {
        # code...
       $id              =   static::decryptedId($id);
       $pay_id          =   static::decryptedId($payment_id);
       
       $regions         =   DB::table('tblregion')->pluck('rid', 'region');
       $project_status  =   DB::table('tblstatus')->get()->pluck('id', 'status');
       $paymode         =   DB::table('tblpaymentmode')->pluck('mode', 'mode');
       $payments        =   DB::table("tblpayment");

       $get_payments    =   $payments->where('clientid', $id)->where('id', $pay_id)->get();
       
       $get_project     =   DB::table('tblproject')->where('pid', $id)->select('title')->first();
       
       $project_id      =   $payments->select('pid')->first();
       $project_info    =   DB::table('tblproject')->select("*")->where('pid', $project_id->pid)->get();

       $client_id       =   $payments->select('clientid')->first();
       $client_info     =   DB::table('all_client_info')->select("*")->where('id', $client_id->clientid)->get();
      

       return view('payments.show', compact('get_payments', 'get_project', 'regions', 'paymode', 'project_status', 'client_info', 'project_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $id             =  static::decryptedId($id);
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $paymode        =  DB::table('tblpaymentmode')->pluck('mode', 'mode');
        $all_clients    =  DB::table('all_client_info')->get();
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->where('id',$id)->get();
        $clientWithProjects = ClientController::clientWithProjects();

        return view('payments.edit', compact('get_payments', 'paymode', 'regions', 'project_status', 'all_clients' ));
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
        $id               =  static::decryptedId($id);
        $createdBy        =  Auth::id();
        $updateData       =  ClientController::allExcept();
        $update           =  DB::table('tblpayment')->where('id', $id)
                                    ->update(array_merge( $updateData, ['receivedby' => $createdBy] ));

        if ($update)
        {
            return redirect()->route('payments.index')->with('success', 'Payment #   ' .$id. ' Updated');
        }
        else
        {
            return redirect()->route('payments.index')->with('success', 'No Update Yet');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Silence is Gold
    }

    public static function additionalCost()
    {

        $costType       =  DB::table('tblcost_type')->pluck('cost_type', 'id');
        $payments       =  DB::table("tblpayment");
        $all_clients    =  DB::table('all_client_info')->get();

        $get_payments   =  $payments->get();
        $clientWithProjects = ClientController::clientWithProjects();

        return view('payments.additional_cost', compact('get_payments','costType','all_clients','clientWithProjects'));

    }

    public function processAdditionalCost(Request $request)
    {
        # code...
        $isProjectId      =  $request->Input('pid');
        $getProjectId     =  DB::table('tblproject')->where('pid',  $isProjectId)->get();
        $totalcost        =  $getProjectId[0]->totalcost;

        $postData         =  ClientController::allExcept();
        $newPayment       =  DB::table('tbladditionalcost')->insertGetId( array_merge( $postData ));
        $amtAddedOn       =  DB::table('tbladditionalcost')->where('id',  $newPayment)->get()->first();
        $conditon         =  [ 'projectid' => $amtAddedOn->pid ];
        $createdBy        =  [ 'created_by' => Auth::id()];


        $projectIdLookUp  =  DB::table(static::$targetTable)->get();
        $projectIdExist   =  $projectIdLookUp;
        $keyExist         =  array_column( [$projectIdExist[0]], "initial_totalcost", 'id') &&
                                    !empty($amtAddedOn->amt_add_on);

        if ( $keyExist )
        {
            $except         =  request()->except(['_token', '_method', 'clientid', 'pid', 'amt_add_on', 'total_payment_made', 'reason','cost_type_id']);
            $computeBudget  =  round($projectIdExist[0]->initial_totalcost, 2) + round($amtAddedOn->amt_add_on, 2);
            $projectId      =  ['projectid' => $amtAddedOn->pid ];
            $projectBudget  =  ['initial_totalcost' =>  $computeBudget ];
            $updateBudget   =   static::totalBalances(static::$targetTable, $conditon, array_merge( $except, $projectId, $projectBudget, $createdBy ));

            if ( $updateBudget )
            {
                return redirect()->route('payments.index')->with('success',
                    'Initial Project Budget: ' .number_format($totalcost, 2). '  '.',  current total expenditure:  '
                        .number_format($computeBudget, 2). ' for Project # ' .$projectId['projectid']);
            }
            else
            {
                return false;
            }
        }

    }

    public static function budgetReview()
    {
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $paymode        =  DB::table('tblpaymentmode')->where('active','=', 'yes')->get()->pluck('mode', 'mode');
        $currency       =  DB::table('tblcurrency')->get()->where('active','=', 'yes')->pluck('short_name', 'short_name');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients    =  DB::table('all_client_info')->get();
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->get();
        $clientWithProjects = ClientController::clientWithProjects();

        return view('payments.budget_review', compact('get_payments', 'paymode', 'currency',
                                'regions', 'project_status', 'all_clients', 'clientWithProjects'));
    }

    public function clientToProject($clientid)
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$clientid)->pluck("title","pid");
        return json_encode($clientProject);
    }

    public static function encryptedId($id)
    {
        $encrypted = Crypt::encrypt($id);
        return $encrypted;
    }

    public static function decryptedId($id)
    {
        $decrypted = Crypt::decrypt($id);
        return $decrypted;
    }
}