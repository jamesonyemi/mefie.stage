<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OnsiteVisitFileUploadController;


class OnsiteVisitController extends Controller
{

   
    private static $relativePath  =  '/project-documents/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onsiteVisit   =  DB::table('vw_group_projectdocs_by_clientid');
        $getAllVisit   =  $onsiteVisit->whereClientId(Auth::user()->clientid)->get();
        return view('onsite_visit.index', compact('getAllVisit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #code ...
        $genders         = DB::table('tblgender')->pluck('id', 'type');
        $regions         = DB::table('tblregion')->pluck('region', 'rid');
        $regionId        = DB::table('tblregion')->get()->pluck('rid', 'region');
        $clients         = DB::table('all_client_info')->get();

        $townId          = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

        return view('onsite_visit.create', compact('genders', 'townId','regions', 'regionId', 'clients', 'project_status', 'project_visited'));
    }

    public function clientToProject($id)
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$id)->pluck("title","pid");
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

        # code...
        static::validator($request->img_name);
        $img_name     =   $request->hasFile('img_name');
        $exceptData   =   request()->except(['_token', '_method', 'img_name', 'base64img_encode', 'clientid','pid']);

        $postData     =   [ 'vdate'    => $request->input('vdate'), 'vtime'    => date("h:i:s"), 'vnumber'  => uniqid(),
                            'status'   => $request->input('status'),
                            'comments' => !empty($request->input('comments')) ?  trim(strip_tags($request->input('comments'))) : '',
                        ];

        if ( $img_name ) {

            $destinationPath   =  public_path() . static::$relativePath;
            $files             =  $request->file('img_name');   // will get all files

            //this statement will loop through all files.
            foreach ($files as $file) {

                $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                $b64imageEncoded     =  base64_encode($file_name);
                $full_path           =  $file->move($destinationPath, $file_name);    //move files to destination folder
                $fileNamesInArray[]  =  $file_name;
                $base64img_encode[]  =  $b64imageEncoded;
                $ImagePathInArray[]  =  static::$relativePath.$file_name;

            }

            $save_visit             =  DB::table('tblvisit')->insertGetId(array_merge($exceptData, $postData));

            $lastInsertedRowOnVisit =  DB::table('tblvisit')->latest('vid')->first();
            $Id                     =  $lastInsertedRowOnVisit->vid;
            $vId                    =  $lastInsertedRowOnVisit->vid;
            $statusId               =  $lastInsertedRowOnVisit->status;

            $generateVnumber        =  ['vnumber' => static::generateUniqueCode($vId)];
            $updateVnumber          =  DB::table('tblvisit')->where('vid', $Id )->update($generateVnumber);

            $projectImgSaveOnvisit  =  DB::table('tblprojectimage')->insertGetId(array_merge(
                request()->except(['_token', '_method','vdate', 'comments','status',]),
                [
                    'img_name'         => json_encode($fileNamesInArray),
                    'img_path'         => json_encode($ImagePathInArray),
                    'base64img_encode' => json_encode($base64img_encode),
                    'vid'              => $save_visit,
                    'status_id'        => $statusId,
                    ]));

        }

        $flashMessage   =   'Visit #' . "\n" . $projectImgSaveOnvisit . ' Created Sucessfully';
        return redirect()->route('onsite-visit.index')->with('success', $flashMessage);


    }

    public static function generateUniqueCode($vnumber)
    {
        return '#' . str_pad($vnumber, 8, "0", STR_PAD_LEFT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id                 =  PaymentController::decryptedId($id);
        $onsiteVisit        =  DB::table('vw_onsite_visit');
        $getAllVisit        =  $onsiteVisit->where('vid', $id)->get();
        $project_owner      =  DB::table('vw_group_projectdocs_by_clientid')->where('pid', $id)->select('full_name', 'project_name', 'region', 'location' , 'pid')->first();

        $projects           =  DB::table('tblproject')->get();
        return view('onsite_visit.view', compact('getAllVisit', 'projects', 'project_owner' ));
    }
    
    public function allProjectsByClient($projectid)
    {
        # code...
        $project_id      =  PaymentController::decryptedId($projectid);
        $projects        =  DB::table('vw_onsite_visit')->where('clientid', $project_id);
        $projectOwners   =  DB::table('tblproject')->where('clientid', $project_id)->get();
        $clientId        =  $projects->select('clientid')->first();
        $client_info     =  DB::table('all_client_info')->where('id', $clientId->clientid)->select('client_name')->first();
            

        return view('onsite_visit.project_owned_by_client', compact('projectOwners', 'client_info') );

    }
    
    public function allVisits($projectid)
    {
        # code...
        $project_id             =  PaymentController::decryptedId($projectid);
        $getClientVisits        =  DB::table('vw_onsite_visit')->where('pid', $project_id)->get();
        // $clientId        =  $getClientVisits->select('clientid')->first();
        // $client_info     =  DB::table('all_client_info')->where('id', $clientId->clientid)->select('client_name')->first();
            

        return view('onsite_visit.all_visits', compact('getClientVisits') );

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id                 = PaymentController::decryptedId($id);
        $onsiteVisit        = DB::table('vw_onsite_visit');
        $getAllVisit        = $onsiteVisit->where('vid', $id)->get();
        $clientWithProjects = ClientController::clientWithProjects();
        $projects           = DB::table('tblproject')->get();
        return view('onsite_visit.edit', compact('getAllVisit', 'projects'));
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

        static::validator($request->img_name);
        $id             =   PaymentController::decryptedId($id);
        $files          =   $request->file('img_name');
        $comments       =   $request->input('comments');
        $date_of_visit  =   $request->input('vdate');
        $exceptData     =   request()->except(['_token', '_method', 'img_name', 'base64img_encode', 'clientid','pid']);
        $onsiteVisit    =   DB::table('tblvisit');
        $directory      =   public_path() . static::$relativePath;
        
        $update_visit   =   $onsiteVisit->where('vid', $id)->update( array_merge($exceptData,['comments' => trim(strip_tags($comments)) ]) );
        
        foreach ($files as $file) {
    
                    $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                    $b64imageEncoded     =  base64_encode($file_name);
                    $full_path           =  $file->move($directory, $file_name);  
                    $fileNamesInArray[]  =  $file_name;
                    $base64img_encode[]  =  $b64imageEncoded;
                    $ImagePathInArray[]  =  static::$relativePath.$file_name;
    
                }
            
            
        $update_project_image   =     DB::table('tblprojectimage')->where('vid', $id)->update(
                    [
                        'img_name' => json_encode($fileNamesInArray),
                        'img_path' =>  json_encode($ImagePathInArray),
                        'base64img_encode' =>  json_encode($base64img_encode),
                        'vid' => $id
                    ]
                    
                );       
    
        $isUpdated      =   ($update_visit || $update_project_image ) ? 'Data had been Updated' : 'No change made';
        
        return redirect()->route('onsite-visit.index')->with('success', $isUpdated);


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

    protected function validator(array $data)
    {
        $mimeType       =   'png,jpg,jpeg,webp,gif';
        $maxSize        =   '50000';
        return Validator::make($data, [  [ "img_name" => 'required|file|'.$mimeType.'|'.'max:'.$maxSize ] ]);
    }

}