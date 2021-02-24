<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //code
        $regions            =  DB::table('tblregion')->pluck('rid', 'region');
        $project_status     =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients        =  DB::table('tblclients')->get();
        $projects           =  DB::table("tblproject");
        $all_projects       =  $projects->get();
        $clientWithProjects =  ClientController::clientWithProjects();

        return view('projects.index', compact('all_projects', 'regions', 'project_status', 'all_clients', 'clientWithProjects'));
    }

    public function allProjects()
    {
        //code
        $regions            =  DB::table('tblregion')->pluck('rid', 'region');
        $project_status     =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients        =  DB::table('tblclients')->get();
        $projects           =  DB::table("tblproject");
        $all_projects       =  $projects->get();
        $projects           =  static::getAllProjects();

        return view('projects.project_list', compact('all_projects', 'regions', 'project_status', 'all_clients', 'projects'));
    }

    public function projectListing()
    {
        # code...
        $all_projects  =  static::allProjectList();
        return view('projects.project_in_general', compact('all_projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $genders  = DB::table('tblgender')->pluck('id', 'type');
        $regions  = DB::table('tblregion')->pluck('region', 'rid');

        $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $titleId  = DB::table('tbltitle')->get()->pluck('tid', 'salutation');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');

        $all_clients    =  DB::table('all_client_info')->get();

        return view('projects.create', compact('genders', 'townId','regions', 'regionId', 'project_status','titleId', 'all_clients'));
    }

    public function getTowns($id)
    {
        $towns =  DB::table("tbltown")->where("rid",$id)->where("active", '=', 'yes')->pluck("town","tid");
        return json_encode($towns);
    }

    public static function filterData()
    {
         # code...
        $get_data   =  DB::table('tbltown')->get()->pluck("town","tid");
        return json_encode($get_data);
    }

    public function clientToProject($clientid)
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$clientid)->pluck("title","pid");
        return json_encode($clientProject);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //code
        $postData      = ClientController::allExcept();
        $createProject = DB::table('tblproject')->insertGetId($postData);
        return redirect()->route('projects.index')->with('success', 'Project #' . "\n" . $createProject . ' Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //code
        $id             =  PaymentController::decryptedId($id);
        $projects       =  DB::table('tblproject')->get();
        $genders        =  DB::table('tblgender')->get();
        $regions        =  DB::table('tblregion')->get();
        $countries      =  DB::table('tblcountry')->get();

        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $townId         =  DB::table('tbltown')->get()->pluck('town', 'tid');
        $regionId       =  DB::table('tblregion')->get()->pluck('region', 'rid');
        $projectById    =  DB::table('tblproject')->where('pid', $id)->get();
        $countryId      =  DB::table('tblcountry')->get()->pluck('region_name', 'id');
        $project_status =  DB::table('tblstatus')->get()->pluck('status', 'id');

        $owner         =   static::getAllProjects();

        foreach ($owner as $key2 => $value2)
        {

            foreach ($projectById as $key => $value)
            {
                if ($value->clientid === $value2->id)
                {
                    $value = $value2 ;
                    $project = $value;
                    $r =  $project;
                }

            }

        }


        return view('projects.show', compact('projectById', 'projects', 'countries', 'townId',
                         'regions', 'regionId','countryId', 'project_status', 'r' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($projectid)
    {
        $id             =  PaymentController::decryptedId($projectid);
        $projects       =  DB::table('tblproject')->get();
        $genders        =  DB::table('tblgender')->get();
        $regions        =  DB::table('tblregion')->get();
        $countries      =  DB::table('tblcountry')->get();

        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $townId         =  DB::table('tbltown')->where('active', 'yes')->get()->pluck('town', 'tid');
        $regionId       =  DB::table('tblregion')->get()->pluck('region', 'rid');
        $projectById    =  DB::table('tblproject')->where('pid', $id)->get();
        $countryId      =  DB::table('tblcountry')->get()->pluck('region_name', 'id');
        $project_status =  DB::table('tblstatus')->get()->pluck('status', 'id');

        $owner         =   static::getAllProjects();

        foreach ($owner as $key2 => $value2)
        {

            foreach ($projectById as $key => $value)
            {
                if ($value->clientid === $value2->id)
                {
                    $value = $value2 ;
                    $project = $value;
                    $r =  $project;
                }

            }

        }

        return view('projects.edit', compact('projectById', 'projects', 'countries', 'townId',
                      'regions', 'regionId','countryId', 'project_status', 'r'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $id             = PaymentController::decryptedId($id);
        $updateData     = ClientController::allExcept();
        $update_project = DB::table('tblproject')->where('pid', $id)->update($updateData);
        $isUpdated      = ($update_project) ? 'had been Updated' : 'No change made' ;
        return redirect()->route('projects.index')->with('success', 'Project #' .$id. ' '. $isUpdated);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $projectid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $projectid)
    {
        //code
        $id                     =  PaymentController::decryptedId($projectid);
        $request->is_deleted    =  true;
        $request->active        =  'no';
        $isDeleted              =  $request->is_deleted;
        $flag_as_deleted        =  ['isdeleted' => $isDeleted, 'active' => $request->active ];
        $update_clientInfo      =  DB::table('tblproject')->where('pid', $id)->update($flag_as_deleted);

        return redirect('/admin-portal/projects')->with('success', 'Project  # ' . $id. ' Info Deleted');
    }

    public function genderStatus($projectid)
    {
        # code...
        $genders     = DB::table('tblgender')->pluck('id', 'type');
        $projects    = DB::table('tblproject')->where('clientid', $projectid)->get();
        return view('project.edit', compact('genders', 'project'));
    }

    public function updateGenderStatus(Request $request, $projectid)
    {


        # code...
        $flag_as  =  ['gender' => "1"];
        $genders  =  DB::table('tblgender')->pluck('id', 'id');
        $client_gender   =  DB::table('tblproject')->where('clientid', $projectid)->update($flag_as);
        return redirect()->route('project.edit');
    }

    public static function getAllProjects()
    {
        # code...
        $projects  = DB::table('tblclients')
        ->leftJoin('all_client_info', 'all_client_info.targeted_client_id', '=', 'tblclients.client_uuid')
        ->leftJoin('tblcorporate_client', 'tblcorporate_client.client_uuid', '=', 'all_client_info.targeted_client_id')
        ->leftJoin('tblproject', 'tblproject.clientid', '=', 'all_client_info.id')
        ->join("users as c", "c.clientid", "=", "all_client_info.id" )
        ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
        ->join('tblstatus', 'tblstatus.id','=', 'tblproject.statusid')
        ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
        ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id', 'all_client_info.id',
                    'tbltown.town as location', 'tblproject.title as project_title','tblclients.phone1 as client_prime_contact', 'tblproject.isdeleted as flag_as_deleted', 'tblproject.pid','all_client_info.client_name  as full_name',  'all_client_info.targeted_client_id', 'all_client_info.client_name', 
                    'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
        ->orderBy('tblproject.pid')
        ->where('tblproject.active', '=', 'yes')
        ->where("c.tenant_id", session()->get("tenant_id") )
        ->where("c.tenant_id", "<>", null )
        ->get()->toArray();

            return $projects;
    }

    public static function allProjectList()
    {
        # code...
        $getAllProjects  = DB::table('all_client_info')
            ->join('tblproject', 'tblproject.clientid', '=', 'all_client_info.id')
            ->join("users as c", "c.clientid", "=", "all_client_info.id" )
            ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
            ->join('tblstatus', 'tblstatus.id','=', 'tblproject.statusid')
            ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
            ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id', 'all_client_info.id as clientid',
                        'tbltown.town as location', 'tblproject.title as project_title', 'all_client_info.targeted_client_id', 'tblproject.pid', 'all_client_info.client_name', 'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
            ->orderBy('tblproject.pid')->where('tblproject.active', '=', 'yes')
            ->where("c.tenant_id", session()->get("tenant_id") )
            ->where("c.tenant_id", "<>", null )
            ->groupBy('tblproject.clientid')
            ->get()->toArray();

            return $getAllProjects;
    }


}