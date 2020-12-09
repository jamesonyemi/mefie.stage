<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\StageOfCompletionController;
use App\Http\Controllers\PaymentController;



class ClientDocumentController extends Controller
{
    
    
    private static $relativeImagePath   =   '/project-documents/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientProject      =  DB::table('vw_my_projects')->where('user_id', Auth::id() )->select('*')->get();
        $documents          =  DB::table('vw_client_project_docs')->where('user_id', Auth::id() )->select('*');
        $retriveDoc         =  $documents->get();
        $documentByUserId   =  $documents->first();
        
        
         if ( empty($documentByUserId) ) {
             
             return view('client_portal.my_documents.no_docs');
         }
         else {
             
            $pid    =  $retriveDoc[0]->project_id;
            
            if ( !empty($retriveDoc) ) 
            {
                $singleDoc  =   DB::table('vw_client_project_docs')->where('project_id', $pid )->select('*')->first();  
                    return view('client_portal.my_documents.multiple_docs', compact('clientProject'));
            }
         }
        
            
        
       
    }

    public function sideMenu()
    {
        # code...
        $documents          =  DB::table('vw_client_project_docs')->where('user_id', Auth::id() )->select('*');
        $retriveDoc         =  $documents->first();
        

        return view('partials.client-portal.side_menu', compact('retriveDoc'));    

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
       
        $id                 =  PaymentController::decryptedId($id);
        $documents          =  DB::table('vw_client_project_docs')->where('project_id', $id )->select('*')->get();
        $projectName        =  DB::table('vw_my_projects')->where('user_id', Auth::id() )
                                                                ->where('pid', $id )->select('title')->first();

        return view('client_portal.my_documents.single_doc', compact('documents', 'projectName'));  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id)
    {
        
        # code ...

        $id                 =   Crypt::decrypt($id);
        $project_docs       =   DB::table('tblprojectdocs')->where('id', $id)->select("*")->first();

        return view('client_portal.my_documents.edit', compact('project_docs'));
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
        # code...
        
        $getField    =  DB::table('tblprojectdocs')->where('id', Crypt::decrypt($id))
                                        ->select('id', 'pid', 'doc_link', 'docname' )->first();

        $getDocName  =  json_decode($getField->docname);
        $getDocLink  =  json_decode($getField->doc_link);

        if ( empty($request->docname) ) {
            # code..
            return redirect()->route('my-documents.index')->with('success', 'No file selected');
        }
        else {
            # code...
            if ( !empty($request->docname) ) {
                # code...
                if ( $request->hasFile('docname') )
                {

                    $destinationPath   =  public_path() . static::$relativeImagePath;
                    $files             =  $request->file('docname');   /** get all files */

                /** loop through all incoming files. */
                    foreach ($files as $file)
                    {

                        $file_name           =  StageOfCompletionController::iCrypto()."_" . $file->getClientOriginalName();
                        $docData             =  base64_encode(static::$relativeImagePath.$file_name);
                        $b64imageEncoded     =  $docData;
                        $src                 =  'data:'.$file->getClientMimeType().';'.'base64,'.$b64imageEncoded;
                        $full_path           =  $file->move($destinationPath, $file_name); /**move-files-to-destination dir*/
                        $fileNamesInArray[]  =  $file_name;
                        $docPath[]           =  static::$relativeImagePath.$file_name;
                    }
                    
                    $incomingDocs       =  json_encode($fileNamesInArray);
                    $generate_docLink   =  json_encode($docPath);
    
                    $retrievedDocs      =  array_values($getDocName); 
                    $docLink            =  array_values($getDocLink);
    
                    $docsArray          =  StageOfCompletionController::dataIndexing($incomingDocs);
                    $linkArray          =  StageOfCompletionController::dataIndexing($generate_docLink);
    
                    $mergeDocs          =  array_merge_recursive([ 'docname'  => array_merge($retrievedDocs, $docsArray), ],
                                                    [ 'doc_link' => array_merge($docLink, $linkArray),]);
                    
                    $mergeUpdate        =  array_merge_recursive($mergeDocs);
                    $updateData         =  DB::table('tblprojectdocs')->where('id', $getField->id)->update($mergeUpdate);
                   
                    $isUpdated          =  ( $updateData ) ? 'had been Updated' : 'No change made' ;
    
                    return redirect()->route('my-documents.index')
                                    ->with('success', 'Document #' .$getField->id. ' '. $isUpdated);
                }


            }
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
        //
    }
}
