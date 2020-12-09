<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\VerifyUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'rocky/admin-portal/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $first_name  = $data['fname'];
        $middle_name = $data['oname'];
        $last_name   = $data['lname'];
        $full_name   = $first_name . " " . $middle_name . " " . $last_name;
        $roleId      = [ 'client' => 3 ];

        $user =  User::create([
            'first_name'  => $first_name,
            'middle_name' => $middle_name,
            'last_name'   => $last_name,
            'full_name'   => $full_name,
            'email'       => $data['email'],
            'role_id'     => $roleId['client'],
            'password'    => password_hash($data['password'], PASSWORD_ARGON2I ),
        ]);
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
          if ( $verifyUser ) {
              $sendVerificaionEmail   =  Mail::to($user->email)->send(new VerifyMail($user));
          }
          return $user;
    }

    public function verifyUser($token)
    {
      $verifyUser = VerifyUser::where('token', $token)->first();
      if( isset($verifyUser) ) {
        $user = $verifyUser->user;
        if(!$user->verified) {
          $verifyUser->user->verified = 1;
          $verifyUser->user->save();
          $status = "Your e-mail is verified. You can now login.";
        } else {
          $status = "Your e-mail is already verified. You can now login.";
        }
      } else {
        return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
      }
      return redirect('/login')->with('status', $status);
    }

    public function signUpClient($clientid)
    {
      #code...
      $encryptUserId  = Crypt::decrypt($clientid);
      $signInClient   = DB::table('users')->where('clientid', $encryptUserId)->first();
      return view('auth.client_login', compact('signInClient'));

    }

    public function signInVerifiedIndividualClient($clientid)
    {
      
      #code...
      $encryptUserId      =   Crypt::decrypt($clientid);
      $client             =   DB::table('tblclients')->where('clientid', $encryptUserId)->first();
      $all_client_info    =   DB::table('all_client_info')->where('targeted_client_id', $client->client_uuid)->first();
      $signInClient       =   DB::table('users')->where('clientid', $all_client_info->id)->first();
     
      
      return view('auth.client_login', compact('signInClient'));

    }


}