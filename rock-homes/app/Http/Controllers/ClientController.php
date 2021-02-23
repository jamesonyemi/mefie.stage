<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Concat;
use App\Http\Controllers\PaymentController;
use App\Mail\ClientRegistrationMail;
use App\Notifications\Clients\CorporateClientLoginNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CorporateUserRequest;
use App\Mail\IndividualClientLoginMailNotify;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Auth;

class ClientController extends Controller
{
    public static $secret;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    public function allClients()
    {
        $clients            =  DB::table("tblcorporate_client");
        $all_clients        =  $clients->get();
        return view('clients.all', compact('all_clients'));
    }


    public function IndividualClientWithProject()
    {
        //code
        $clientWithProjects =  static::clientWithProjects();
        $clients            =  DB::table("tblcorporate_client");
        $all_clients        =  $clients->get();

        return view('clients.individual', compact('all_clients', 'clientWithProjects'));
    }

    public function IndividualClientWithNoProject()
    {
        //code
        $clientWithZeroProject =  static::clientWithZeroProject();
        $clients               =  DB::table("tblcorporate_client");
        $nationality           =  DB::table('tblcountry')->pluck('id', 'country_name');
        $all_clients           =  $clients->get();
        $projects              =  DB::table("tblproject");
        $get_projects          =  $projects->get();

        return view('clients.individual_with_no_project', compact('all_clients', 'get_projects', 'nationality', 'clientWithZeroProject'));
    }

    public function corporateClientWithProject()
    {
        //code
        $clientWithProjects  =  static::corporateClientProject();
        $regions             =  DB::table('tblregion')->pluck('rid', 'region');
        $clients             =  DB::table("tblcorporate_client");
        $corporate           =  $clients->get();

        return view('clients.corporate_client_with_project', compact('corporate', 'regions','clientWithProjects'));
    }

    public function corporateClientWithNoProject()
    {
        //code
        $zeroProject           =  static::corporateClientWithZeroProject();
        $regions               =  DB::table('tblregion')->pluck('rid', 'region');
        $corporateClients      =  DB::table("tblcorporate_client")->get();

        return view('clients.corporate_client_without_project', compact('corporateClients', 'zeroProject'));
    }

    public static function clientWithProjects()
    {
        # code...
        $clientWithProjects  = DB::table('tblclients')
            ->join('all_client_info', 'all_client_info.targeted_client_id', '=', 'tblclients.client_uuid')
            ->join('tblproject', 'tblproject.clientid', '=', 'all_client_info.id')
            ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
            ->join('tblstatus', 'tblstatus.id','=', 'tblproject.statusid')
            ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
            ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id',
                        'tbltown.town as location', 'tblproject.title as project_title','tblclients.phone1 as client_prime_contact',
                        'tblclients.phone2 as client_second_contact','tblclients.email as client_email','tblproject.pid',
                        'tblclients.clientid',( DB::raw('Concat(tblclients.title, " ",tblclients.fname, " ", tblclients.lname) as full_name') ), 'tblclients.isdeleted', 'all_client_info.targeted_client_id', 'all_client_info.client_name',
                        'tblclients.active', 'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
            ->orderBy('tblproject.pid')->where('tblclients.active', '=', 'yes')
            ->where('tblproject.active', '=', 'yes')
            ->get()->toArray();

            return $clientWithProjects;
    }

    public static function clientWithZeroProject()
    {
        # code...
        $clientWithZeroProject  = DB::table('all_client_info as a')
        ->join("tblclients as b", "b.client_uuid", "=", "a.targeted_client_id" )
        ->join("users as c", "c.clientid", "=", "a.id" )
        ->select('b.*')
        ->whereNotIn('c.clientid', [("select tblproject.clientid from tblproject ")] )
        ->where("c.tenant_id", session()->get("tenant_id") )
        ->where("c.tenant_id", "<>", null )
        ->get()->toArray();

        

        return $clientWithZeroProject;

    }

    public static function corporateClientWithZeroProject()
    {
        # code...
        $corpWithZeroProject  = DB::table('all_client_info as a')
        ->join("tblcorporate_client as b", "b.client_uuid", "=", "a.targeted_client_id" )
        ->join("users as c", "c.clientid", "=", "a.id" )
        ->select('b.*')
        ->whereNotIn('c.clientid', [("select tblproject.clientid from tblproject ")] )
        ->where("c.tenant_id", session()->get("tenant_id") )
        ->where("c.tenant_id", "<>", null )
        ->get()->toArray();
        

        return $corpWithZeroProject;

    }

    public static function corporateClientProject()
    {
        # code...

        $corpWithZeroProject  = DB::table('tblcorporate_client')
        ->join('all_client_info', 'all_client_info.targeted_client_id', '=', 'tblcorporate_client.client_uuid')
        ->join('tblproject', 'tblproject.clientid', '=', 'all_client_info.id')
        ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
        ->join('tblstatus', 'tblstatus.id','=', 'tblproject.statusid')
        ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
        ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id', 'tblcorporate_client.id',
                    'tbltown.town as location', 'tblproject.title as project_title','tblproject.pid',
                    'all_client_info.targeted_client_id', 'all_client_info.client_name',
                    'tblcorporate_client.company_name', 'tblcorporate_client.mobile', 'tblcorporate_client.primary_email',  'tblcorporate_client.secondary_email', 'tblcorporate_client.postal_addr',  'tblcorporate_client.res_addr', 'tblcorporate_client.fax', 'tblcorporate_client.isdeleted','tblcorporate_client.active', 'tblcorporate_client.client_uuid',
                    'tblcorporate_client.active', 'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
        ->orderBy('tblproject.pid')->where('tblcorporate_client.active', '=', 'yes')
        ->where('tblproject.active', '=', 'yes')
        ->get()->toArray();


        return $corpWithZeroProject;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $genders    =  DB::table('tblgender')->pluck('id', 'type');
        $countryId  =  DB::table('tblcountry')->get()->pluck('id', 'country_name');
        $titleId    =  DB::table('tbltitle')->get()->pluck('tid', 'salutation');

        return view('clients.create', compact('genders', 'countryId','titleId'));
    }

    public function corporateForm()
    {
        //code
        $genders    =  DB::table('tblgender')->pluck('id', 'type');
        $countryId  =  DB::table('tblcountry')->get()->pluck('id', 'country_name');
        $titleId    =  DB::table('tbltitle')->get()->pluck('tid', 'salutation');

        return view('clients.corporate', compact('genders', 'countryId','titleId'));
    }

    public function individualClientForm()
    {
        //code
        $genders    =  DB::table('tblgender')->pluck('id', 'type');
        $countryId  =  DB::table('tblcountry')->get()->pluck('id', 'country_name');
        $titleId    =  DB::table('tbltitle')->get()->pluck('tid', 'salutation');

        return view('clients.ic_form', compact('genders', 'countryId','titleId'));
    }

    public static function allExcept()
    {
        $data = request()->except(['_token', '_method']);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        #code
        $primaryPhoneNumber  =  $request->phone1;
        $successMessage      =  '"Created Sucessfully, with an Email sent to Login, please contact client ("'.$primaryPhoneNumber.'")
                                    to check their Inbox';

        $postData            =  static::allExcept();
        $client_uuid         =  static::encryptRandomizedInteger();
        $showPassWord        =  static::randomizedInteger();
        static::$secret      =  $showPassWord;
        $password            =  password_hash($showPassWord, PASSWORD_ARGON2I );

        $createNewClient     =  DB::table('tblclients')->insertGetId(array_merge($postData, ["client_uuid" => $client_uuid]));
        $client              =  DB::table('tblclients')->where('clientid', $createNewClient)->select('*')->first();
        $currentClientEmail  =  $client->email;
        $full_name           =  $client->title . ' '. $client->fname .' '.$client->oname. ' '.$client->lname;
        $roleId              =  static::individualClientRoleId();
        $clientId            =  $client->clientid;

        if ( $createNewClient ) {
            # code...
            $data              =  static::processIndividualClientData($roleId, $password, $full_name);
            $createClientRole  =  static::allClientInfo($client->client_uuid, $full_name, $roleId);

            $saveRole          =  DB::table('all_client_info')->insertGetId(array_merge($createClientRole));
            $clientInfo        =  DB::table('all_client_info')->where('id', $saveRole)->select('*')->first();
            $saveClientAsUser  =  DB::table('users')->insertGetId(array_merge_recursive($data, ['clientid'   => $clientInfo->id]));

            $userRole          =  [ 'role_id' => $roleId, 'user_id' => $saveClientAsUser, 'created_by' => Auth::user()->id,  ];
            $saveClientAsUser  =  DB::table('tbluser_role')->insertGetId(array_merge_recursive($userRole));

                  if ( $saveClientAsUser ) {
                      # code...
                      static::sendLoginDetailsToClient($request->email, $showPassWord, $client, $full_name);
                  }
             }
            return redirect()->route('clients.index')->with('success', 'Client # "'. ' '.$createNewClient. $successMessage);

    }

    public function corporateClient(Request $request)
    {

        $flashMessage     =   'Corporate Client Created Sucessfully, please contact client Id #  ';
        $postData         =   static::processCorporateClientData();
        $corporateClient  =   DB::table('tblcorporate_client')->insertGetId(array_merge_recursive($postData));
        $newCorporateUser =   DB::table('tblcorporate_client')->where('id', $corporateClient )
                                    ->select('client_uuid','company_name','primary_email', 'secondary_email', 'mobile')->first();

        $arrayList        =   explode(' ', $newCorporateUser->company_name);
        $first_name       =   array_shift($arrayList);
        $last_name        =   implode(' ',$arrayList);
        $secretWord       =   static::randomizedInteger();
        $secretKey        =   $secretWord;

        $roleId           =   static::corporateClientRoleId();
        $clientId         =   $newCorporateUser->client_uuid;
        $company_name     =   $newCorporateUser->company_name;
        $email            =   $newCorporateUser->primary_email;
        $sec_email        =   $newCorporateUser->secondary_email;
        $full_name        =   $company_name;
        $password         =   password_hash($secretKey, PASSWORD_ARGON2I );

        $data             =   [

            'role_id'    => $roleId,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'full_name'  => $company_name,
            'email'      => $email,
            'password'   => $password,
            'verified'   => static::isVerified(),

        ];


        if ( $corporateClient ) {
            # code...
            $createClientRole       =  static::allClientInfo($clientId, $company_name, $roleId);
            $saveRole               =  DB::table('all_client_info')->insertGetId(array_merge_recursive($createClientRole));
            $clientInfo             =  DB::table('all_client_info')->where('id', $saveRole)->select('*')->first();
            $createCorporateUser    =  DB::table('users')->insertGetId(array_merge_recursive($data,
                                                     ['clientid'   => $clientInfo->id]));

            $userRole               =  [ 'role_id' => $roleId, 'user_id' => $createCorporateUser, 'created_by' => Auth::user()->id  ];
            $saveClientAsUser       =  DB::table('tbluser_role')->insertGetId(array_merge_recursive($userRole));

            if ( $createCorporateUser ) {
                        FacadesNotification::route('mail', $email)->notify(new CorporateClientLoginNotification($email, $secretKey, $company_name));
                    }

                return redirect()->route('corporate-client-wnp')->with('success', $flashMessage.$createCorporateUser.' (with phone number '.$newCorporateUser->mobile.') to check their Inbox');

            }
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
        $id           = PaymentController::decryptedId($id);
        $clients      = DB::table('tblclients')->get();
        $genders      = DB::table('tblgender')->get();
        $countries    = DB::table('tblcountry')->get();

        $genId        = DB::table('tblgender')->get()->pluck('type', 'id');
        $countryId    = DB::table('tblcountry')->get()->pluck('country_name', 'id');
        $clientId     = DB::table('tblclients')->where('clientid', $id)->get();
        $format_date  = static::textualDate();

        return view('clients.show', compact('clientId', 'clients', 'genders', 'genId', 'countries', 'countryId', 'format_date' ));
    }

    public function viewCorporateClient($id)
    {
        $id         = PaymentController::decryptedId($id);
        $corporate  = DB::table('tblcorporate_client')->where('id', $id)->get();
        return view('clients.view_corporate', compact('corporate'));
    }

    public static function textualDate( $date_field = '')
    {
        # code...
        $text_format = date("l, jS F, Y", strtotime($date_field));
        return $text_format;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id         = PaymentController::decryptedId($id);
        $clients    = DB::table('tblclients')->get();
        $genders    = DB::table('tblgender')->get();
        $countries  = DB::table('tblcountry')->get();

        $genId      = DB::table('tblgender')->get()->pluck('type', 'id');
        $countryId  = DB::table('tblcountry')->get()->pluck('country_name', 'id');
        $clientId   = DB::table('tblclients')->where('clientid', $id)->get();

        return view('clients.edit', compact('clientId', 'clients', 'genders', 'genId', 'countries', 'countryId' ));
    }

    public function editCorporateClient($id)
    {
        $id         = PaymentController::decryptedId($id);
        $corporate  = DB::table('tblcorporate_client')->where('id', $id)->get();
        return view('clients.edit_corporate', compact('corporate', 'id'));

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
        $updateData        = static::allExcept();
        $update_clientInfo = DB::table('tblclients')->where('clientid', $id)->update($updateData);
        $isUpdated         = ($update_clientInfo) ? 'Info had been Updated' : 'No change made' ;
        return redirect()->route('clients.index')->with('success', 'Client #' .$id. ' '. $isUpdated);
    }

     public function updateCorporateClient(Request $request, $id)
    {

        $updateData        = static::processCorporateClientData();
        $update_clientInfo = DB::table('tblcorporate_client')->where('id', $id)->update(array_merge($updateData));
        $isUpdated         = ($update_clientInfo) ? 'Info had been Updated' : 'No change made' ;
        return redirect()->route('clients.index')->with('success', 'Client #' .$id. ' '. $isUpdated);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //code
        $decryptId            =  PaymentController::decryptedId($id);
        $getId                =  $decryptId;
        $request->active      =  'no';
        $request->isdeleted   =  true;
        $isDeleted            =  [ "active" => $request->active, "isdeleted" => $request->isdeleted ];
        $update_clientInfo    =  DB::table('tblproject')->where('pid', $getId)->update($isDeleted);

        return redirect('/admin-portal/clients')->with('success', 'Project #' . $getId. ' Info Deleted');
    }

    public function destroyClientData(Request $request, $id)
    {
        //code
        $decryptId            =  PaymentController::decryptedId($id);
        $getId                =  $decryptId;
        // ddd($getId);
        $request->active      =  'no';
        $request->isdeleted   =  true;
        $isDeleted            =  [ "active" => $request->active, "isdeleted" => $request->isdeleted ];
        $update_clientInfo    =  DB::table('tblclients')->where('clientid', $getId)->update($isDeleted);

        return redirect('/admin-portal/clients')->with('success', 'Client ID #' . $getId. ' Info Deleted');
    }

    public function removeDataModal(Request $request, $id)
    {
        $decryptId            =  PaymentController::decryptedId($id);
        $getId                =  $decryptId;
        // ddd($getId);
        $getProject           =  DB::table('tblproject')->where('pid', $getId)->get();
        return view('clients.remove_modal_form', compact('getProject'));

    }

    public function removeCorporateClientData(Request $request, $id)
    {
        $decryptId            =  PaymentController::decryptedId($id);
        $getId                =  $decryptId;
        $request->active      = "no";
        $request->isdeleted   = "yes";
        $isDeleted            =  [ "active" => $request->active, "isdeleted" => $request->isdeleted ];
        $update_clientInfo    =  DB::table('tblcorporate_client')->where('id', $decryptId)
                                   ->update($isDeleted);

        return redirect('/admin-portal/clients')->with('success', 'Client #' . $decryptId. ' Info Deleted');
    }

    public function genderStatus($id)
    {
        # code...
        $genders    = DB::table('tblgender')->pluck('id', 'type');
        $clients    = DB::table('tblcorporate_client')->where('id', $id)->get();
        return view('clients.edit', compact('genders', 'clients'));
    }

    public function updateGenderStatus(Request $request, $id)
    {
        # code...
        $flag_as        =  ['gender' => "1"];
        $genders        =  DB::table('tblgender')->pluck('id', 'id');
        $client_gender  =  DB::table('tblcorporate_client')->where('id', $id)->update($flag_as);
        return redirect()->route('clients.edit');
    }

    public  static function clientFullName()
    {
        # code...
        $clients    = DB::table('tblcorporate_client')->get();
            foreach ($clients as $key => $client)
            {
                $title         = $client->title;
                $first_name    = $client->fname;
                $last_name     = $client->lname;
                $concated_name = $title . "\n" . $first_name . "\n". $last_name;
                $full_name     = $concated_name;
                return $full_name;
            }
    }


    public static function sendRegistrationEmail($email, $target)
    {
        # code...
        $send = Mail::to( $email )->send( new ClientRegistrationMail($target) );
        return $send;
    }

    public static function sendLoginDetailsToClient($email, $secret, $target, $full_name )
    {
        # code...
         $send = Mail::to( $email )->send( new IndividualClientLoginMailNotify($email, $secret, $target, $full_name) );
         return $send;
    }

    public static function processData( array $data )
    {
        return $data;
    }

    public static function processCorporateClientData()
    {
        # code...
        $postData  =  static::processData([

            'primary_email'    =>  request('primary_email'),
            'secondary_email'  =>  request('secondary_email'),
            'company_name'     =>  request('company_name'),
            'mobile'           =>  request('mobile'),
            'postal_addr'      =>  request('postal_addr'),
            'fax'              =>  request('fax'),
            'tel_no'           =>  request('tel_no'),
            'res_addr'         =>  request('res_addr'),
            'client_uuid'      =>  static::encryptRandomizedInteger(),
        ]);
        return $postData;
    }

    private static function processIndividualClientData($role_id, $password, $full_name)
    {
        # code...
        $postData  =  static::processData([

            'first_name'   =>  request('fname'),
            'last_name'    =>  request('lname'),
            'middle_name'  =>  request('oname'),
            'verified'     =>  static::isVerified(),
            'email'        =>  request('email'),
            'role_id'      =>  $role_id,
            'password'     =>  $password,
            'full_name'    =>  $full_name,
        ]);
        return $postData;
    }

    private static function allClientInfo($client_id, $client_name, $role_id)
    {
        # code...
        $data  = static::processData(['targeted_client_id' =>  $client_id, 'client_name' => $client_name, 'role_id' =>  $role_id, ]);
        return $data;
    }

    public static function isVerified()
    {
        # code...
        $isVerified     =   [ 'verified' => true];      //verification status, set to true
        $getStatus      =   $isVerified['verified'];
        return $getStatus;
    }

    public static function individualClientRoleId()
    {
        # code...
        $roleId     =   [ 'individual_client' => 3 ];   //individual-client role-id
        $getRole    =   $roleId['individual_client'];
        return $getRole;
    }

    public static function corporateClientRoleId()
    {
        # code...
        $roleId     =   [ 'corporate_client' => 5];   //corporate-client role-id
        $getRole    =   $roleId['corporate_client'];
        return $getRole;
    }

    public static function encryptRandomizedInteger()
    {
        # code...
        $encryptRandom_integer = time().random_int(1111, 9999);
        return PaymentController::encryptedId($encryptRandom_integer);
    }

    public static function randomizedInteger()
    {
        # code...
        $random_integer = time().random_int(1111, 9999);
        return $random_integer;
    }

    public function fetchEmail()
    {
        # code...
        $userEmail      =  static::filterEmail("users", "email");
        $clientEmail    =  static::filterEmail("tblclients", "email");
        $corporateEmail =  static::fetchCorporateClientEmail();
        $emailUnified   =  json_decode( $userEmail, $clientEmail);

        return  array_flatten($emailUnified, [$corporateEmail]);

    }

    public function fetchCorporateClientEmail()
    {
        # code...
        $cc_email   =   static::filterEmail("tblcorporate_client", "primary_email");
        return $cc_email;
    }

    public static function filterData( $table,$key, $optionalKey = '')
    {
        //  # code...
         $get_data  =  DB::table($table)->get()->pluck($key);
             return json_encode($get_data);

    }

    public static function filterEmail( $table, $email_value)
    {

         $get_email  =  DB::table($table)->get()->pluck($email_value);
             return json_encode($get_email);

    }

}