<?php

namespace App\Http\Controllers\Repository;

use Auth;
use App\User;
use App\Customer;
use Carbon\Carbon;
use App\VerifyUser;
use App\Mail\VerifyMail;
use App\Traits\EncryptData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Traits\NotIncludedInRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomerAccountActivation;


class CustomerRepository
{
    use NotIncludedInRequest, EncryptData;
    # code...
    public static function createNewCustomer($param)
    {
        # code...
        $create_new_customer = DB::table('customers')->insertGetId(array_merge(
           static::excludeFromRequest("_token", "_method", "tc"),
            [

                'company_name'  =>  $param->company_name,
                'phone_number'  =>  $param->phone_number,
                'email'         =>  $param->email,
                'password'      =>  static::hashData($param->password),
                'role_id'       =>  static::assignAdminRole(),
                'token'         =>  sha1(time()),
                'cust_ip'       =>  Request()->ip(),
                'tenant_id'     =>  sha1(time()).(Crypt::encrypt(sha1(time().random_int(1111, 9999)))),
                'tc'            =>  true,  //terms and conditions
                'pricing_plan_id'  =>  $param->pricing_plan_id,

            ]
        ));

        $customer = Customer::where("id", $create_new_customer)->first();
        static::sendCustomerNotification($param->password, $customer->token);

    }

    private static function assignAdminRole(): String
    {
        # code...
        $admin_type   =   collect(DB::table('tblrole')->select('*')->get())->firstWhere("type", 'admin');
        return $admin_type->id;
    }

    private static function sendCustomerNotification( $password, $token)
    {

        $customer = Customer::where("token", $token)->first();
        $message = [

            'subject'   =>  'Account Verification ',
            'greeting'  =>  'Hello',
            'password'  =>  $password,
            'email'     =>  $customer->email,
            'recipient' =>  $customer->company_name,
            'body'      =>  'Please click the button below to activate your account',
            'appreciation' => 'Thank you for using'. " " . config('app.name'),
            'actionText'   => 'Verify Account',
            'actionURL'    =>  static::customerAccountVerificationUrlWithExpiration($customer->token),
            'token' => $customer->token,
        ];
        
        Notification::send($customer, new CustomerAccountActivation($message,  $customer->token));
    }

    private static function customerAccountVerificationUrlWithExpiration($token)
    {
        return URL::temporarySignedRoute(
            'customer-account-activation', now()->addMinutes(60), ['token' => $token]
        );
    }

}