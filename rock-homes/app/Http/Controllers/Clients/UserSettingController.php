<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Auth;


use Illuminate\Http\Request;

class UserSettingController extends Controller
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
        $verifiedUsers  =   $users->get();

        return view('client_portal.my_settings.index', compact('verifiedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client_portal.my_settings.create');
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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'oname' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        // $id             =   Crypt::decrypt($id);
        // $users          =   DB::table('users');
        // $roles          =   DB::table('tblrole')->pluck('id', 'type');
        // $verifiedUsers  =   $users->where('id', $id)->get();

        // return view('client_portal.user_settings.v_show', compact('verifiedUsers', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id             =   Crypt::decrypt($id);
        $users          =   DB::table('users');
        $verifiedUsers  =   $users->where('id', $id)->get();

        return view('client_portal.my-user-settings.v_edit', compact('verifiedUsers'));

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
        
        $id                 =   Crypt::decrypt($id);
        $updateData         =   request()->except(['_token', '_method', 'password_confirmation']);
        $password           =   password_hash($request->password, PASSWORD_ARGON2I );
        $full_name          =   $request->first_name . " " . $request->middle_name . " " . $request->last_name;
        $user_data          =   [ 'full_name' => $full_name, 'password' => $password];
        $update_project     =   DB::table('users')->where('id', $id)
                                        ->update(array_merge($updateData,$user_data), [ 'id' => $id ] );

        $isUpdated          =   ($update_project) ? 'User Info Updated Successfully' : 'No change made' ;

        return redirect()->route('logout')->with('success', $isUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id  = Crypt::decrypt($id);
    }

    public function import()
    {
        // dd(User::all());
        $file_name = request()->file("import-users");
        Excel::import(new UsersImport, $file_name);

        return redirect('user-settings')->with('success', 'All good!');
    }

    public function export()
    {
        $name = request()->input("export-users");
        return Excel::download(new UsersExport, $name.'.xlsx');
    }

}
