<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCustomerRequest;
use App\Traits\CustomerAccountVerification;
use App\Notifications\CustomerAccountActivation;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Repository\CustomerRepository;


class ClientOnboarding extends Controller
{

    use CustomerAccountVerification;

    public function index()
    {
         return view('mefie_client_onboarding.welcome');
    }

    public function create()
    {
        $pricing_plan   =   collect(DB::table('pricing_plan')->select('*')->get())->firstWhere("package_type", "standard");
        return view('mefie_client_onboarding.form', compact("pricing_plan"));
    }

    public static function storeCustomerInfo(StoreCustomerRequest $request, CustomerRepository $customer)
    {
        # code...
        $create_customer    =   $customer->createNewCustomer($request);
        return redirect()->route('customer-onboarding');

    }

    public function activateCustomerAccount($token)
    {

        $customer             =  DB::table("customers");
        $get_customer_token   =  $customer->where('token', $token)->first();
        static::updateCustomerInfo($get_customer_token->token);

        $arrayList        =   explode(' ', $get_customer_token->company_name);
        $first_name       =   array_shift($arrayList);
        $last_name        =   implode(' ',$arrayList);
        $get_updated_info =  $get_customer_token;

        $is_already_a_user  =   DB::table('users')->whereUserToken($token)->first();
        if ( !empty($is_already_a_user->email) )
        {
            return redirect()->route('being-here-before');
        }
        else{
            static::copyCustomerDataIntoUserTable($first_name, $last_name, $get_updated_info);
            return redirect()->route('successful-onboarding');

        }

    }

    protected static function updateCustomerInfo($customer_incoming_token)
    {
        $update_customer_activation_status    =   DB::table("customers")->where('token', $customer_incoming_token)->update([

            "is_account_activated" => true,
            "is_on_trial" => true,
            "date_of_account_activation" => Carbon::today(),
            "pricing_plan_expiry_date"   => Carbon::today()->addMonths(1),

          ]);

    }

    protected static function copyCustomerDataIntoUserTable($first_name, $last_name, $customerInfo)
    {
        # code...
        $create_user  =  DB::table("users")->insertGetId([

          "first_name"  => $first_name,
          "last_name"   => $last_name,
          "full_name"   => $customerInfo->company_name,
          "role_id"     => $customerInfo->role_id,
          "email"       => $customerInfo->email,
          "password"    => $customerInfo->password,
          'verified'    => true,
          'user_token'  => $customerInfo->token,
          'pricing_plan_id' => $customerInfo->pricing_plan_id,
          'account_activation_date' => $customerInfo->date_of_account_activation,
          'account_activation_expiry_date' => $customerInfo->pricing_plan_expiry_date,

      ]);

    }

    public function onboardingMessage()
    {
        # code...
        return view('partials.customer_onboarding')->with('success', 'One More Step!');
    }

    public function successfulOnboardingMessage()
    {
        # code...
        return view('partials.congrat_message')->with('congratulation_message', 'Congratulations');
    }

    public function beingHereBefore()
    {
        # code...
        return view('partials.being_here_before_message')->with('congratulation_message', 'Welcome Home');
    }

}