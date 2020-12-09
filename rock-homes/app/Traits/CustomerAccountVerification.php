<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait CustomerAccountVerification
{
    # code...
    public static function verifyCustomerAsUser($token)
    {
      $verifyUser = DB::table("users")->whereUserToken($token)->first();
      if( isset($verifyUser) ) {

        if( !($verifyUser->verified === true) ) {
          $status = "Your e-mail is verified. You can now login.";
        } else {
          $status = "Your e-mail is already verified. You can now login.";
        }
      } else {
        return redirect('/login')->with('warning', "we cannot identified credential.");
      }
      return redirect('/login')->with('status', $status);
    }

}