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

class ProjectDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projectDocByClientId  =  DB::table('vw_group_projectdocs_by_clientid')->get();
        return view('project_documents.index', compact('projectDocByClientId') );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_client             =  ProjectController::allProjectList();
        $contract_docs_type     =  DB::select('select * from contract_document_type where is_active = 1');
        return view('project_documents.create', compact('all_client', 'contract_docs_type') );
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
            // ddd($request->all());
            if ($request->hasFile('docname')) {

                $relativePath       =  '/project-documents/';
                $destinationPath    =  public_path() . $relativePath;
                $files              =  $request->file('docname');   // will get all files

                foreach ($files as $file) {

                    $file_name              =  date("Y-m-d h_i_s") . "_" . $file->getClientOriginalName();
                    $b64imageEncoded        =  base64_encode($file_name);
                    $full_path              =  $file->move($destinationPath, $file_name);    //move files to destination folder
                    $alternative_name[]     =  date("Y-m-d h_i_s") . "_" . pathinfo($file_name, PATHINFO_FILENAME); //file original name,without extension
                    $fileNamesInArray[]     =  $file_name;
                    $base64img_encode[]     =  $b64imageEncoded;
                    $doc_link[]             =  $relativePath.$file_name;

                }
            }

            $save = DB::table('tblprojectdocs')->insertGetId(array_merge(
                request()->except(['_token', '_method',  'docname']),
                [
                    'pid'               =>  $request->pid,
                    'cid'               =>  $request->cid,
                    'is_ready'          =>  $request->input('is_ready'),
                    'is_submitted'      =>  $request->input('is_submitted'),
                    'is_prepared'       =>  $request->input('is_prepared'),
                    'contract_docs_id'  =>  $request->input('contract_docs_id'),
                    'docname'           =>  json_encode($fileNamesInArray),
                    'doc_link'          =>  json_encode($doc_link),
                ]
            ));

            return redirect()->route('project-docs.index')->with('success', 'Document #  ' .$save. ' Recorded Sucessfully');

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
        $group_documents    =  DB::table('vw_group_projectdocs_by_contract_doc_id')->where('pid', $id);
        $project_owner      =  DB::table('vw_group_projectdocs_by_projectid')->where('pid', $id)->select('full_name', 'project_name', 'region', 'location' , 'pid')->first();
        $owners             =  $group_documents->get();

        return view('project_documents.show', compact('owners', 'project_owner') );
    }

    public function getProjectsByClientId($projectid)
    {
        # code...
        $project_id      =  PaymentController::decryptedId($projectid);
        $projects        =  DB::table('tblproject')->where('clientid', $project_id);
        $projectOwners   =  $projects->get();
        $clientId        =  $projects->select('clientid')->first();
        $client_info     =  DB::table('all_client_info')->where('id', $clientId->clientid)->select('client_name')->first();
            

        return view('project_documents.project_owned_by_client', compact('projectOwners', 'client_info') );

    }
    
    public static function getClientHavingProject($clientid)
    {
        # code...
        $clientWithProject  = DB::table('tblproject')
        ->where('clientid', $clientid )->pluck('title','pid');
      
        return json_encode($clientWithProject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pid)
    {

        $id             =  PaymentController::decryptedId($pid);
        $projectDocs    =  DB::table('vw_group_projectdocs_by_clientid')->where('pid', $id)->get();
        $all_clients    =  ProjectController::allProjectList();

        return view('project_documents.edit', compact('projectDocs', 'all_clients') );
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

        $id             = PaymentController::decryptedId($id);
        $updateData     = ClientController::allExcept();

        $postData       = static::processDataInput();
        $getDocs        = DB::table('vw_projectdocs_with_owner')->get();
        $update_project = DB::table('tblprojectdocs')->where('id', $id)->update( array_merge_recursive($postData));
        $isUpdated      = ($update_project) ? 'Data had been Updated' : 'No change made' ;

        return redirect()->route('project-docs.index')->with('success', $isUpdated);

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

    public static function processDataInput()
    {
        # code...
        $postData  =  ClientController::processData([

            'pid'           =>  request('pid'),
            'is_ready'      =>  request('is_ready'),
            'is_submitted'  =>  request('is_submitted'),
            'is_prepared'   =>  request('is_prepared'),
        ]);
        return $postData;
    }
}