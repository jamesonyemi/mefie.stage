<?php

namespace App\Http\Controllers;

use App\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class VerifiedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $users          =   DB::table('users');
        $verifiedUsers  =   $users->latest('created_at')->paginate();

        return view('users.index', compact('verifiedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles          =   DB::table('tblrole')->pluck('id', 'type');
        return view('users.create', compact('roles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname'     => 'required|string|max:255',
            'oname'     => 'string|max:255',
            'lname'     => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_id'   => 'required|integer',
            'password'  => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $first_name      =  $request['first_name'];
        $middle_name     =  $request['middle_name'];
        $last_name       =  $request['last_name'];
        $user_role_id    =  $request['role_id'];
        $full_name       =  $first_name . " " . $middle_name . " " . $last_name;
        $active          =  ['active' => 'yes'];
        $password        =  $request['password'];
        
        $user_info       =  DB::table('users')->where('role_id', Auth::user()->role_id )->first(); 
       

        $save_user = DB::table('users')->insertGetId(array_merge(
            request()->except(['_token', '_method', 'password_confirmation']),
            [

             'first_name'       => $first_name,
             'middle_name'      => $middle_name,
             'last_name'        => $last_name,
             'full_name'        => $full_name,
             'active'           => $active['active'],
             'role_id'          => $user_role_id,
             'photo_url'        => $user_info->photo_url,
             'contact_details'  => $user_info->contact_details,
             'created_by'       => Auth::id(),
             'creator_name'     => Auth::user()->full_name,
             'password'         => Password_hash($password, PASSWORD_ARGON2I)

             ]));

             if ($save_user)
             {
                return redirect()->route('verified-users.index')->with('success', 'User ID #' . "\n" . $save_user . ' Created Sucessfully');
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
        $id             =   PaymentController::decryptedId($id);
        $users          =   DB::table('users');
        $roles          =   DB::table('tblrole')->pluck('id', 'type');
        $verifiedUsers  =   $users->where('id', $id)->get();

        return view('users.v_show', compact('verifiedUsers', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id             =   PaymentController::decryptedId($id);
        $users          =   DB::table('users');
        $verifiedUsers  =   $users->where('id', $id)->get();

        return view('users.v_edit', compact('verifiedUsers'));

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
        $id             =   PaymentController::decryptedId($id);
        $updateData     =   ClientController::allExcept();
        $full_name      =   $request->first_name . " " . $request->middle_name . " " . $request->last_name;
        $user_full_name =   [ 'full_name' => $full_name];
        $update_project =   DB::table('users')->where('id', $id)->update( array_merge($updateData, $user_full_name ) );
        $isUpdated      =   ($update_project) ? 'had been Updated' : 'No change made' ;
        return redirect()->route('verified-users.index')->with('success', 'User #' .$id. ' '. $isUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id  = PaymentController::decryptedId($id);
    }

    public function import()
    {
        // dd(User::all());
        $file_name = request()->file("import-users");
        Excel::import(new UsersImport, $file_name);

        return redirect('verified-users')->with('success', 'All good!');
    }

    public function export()
    {
        $name = request()->input("export-users");
        return Excel::download(new UsersExport, $name.'.xlsx');
    }

}