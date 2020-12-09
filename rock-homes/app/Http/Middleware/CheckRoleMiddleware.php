<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckRoleMiddleware
{
    

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        
        $assignRole = [
            
          'role' => [

                'super-admin'        =>  [ 'type' => 'super-admin', 'id'   => 1, ],
                'admin'              =>  [ 'type' => 'admin', 'id'   => 2, ],
                'corporate-client'   =>  [ 'type' => 'corporate-client', 'id'   => 3, ],
                'individual-client'  =>  [ 'type' => 'individual-client', 'id'   => 5, ],
               
            ],

        ];

        $selectedFields          =  ['id', 'type' ];
        $roles                   =  DB::table('tblrole')->where('id', Auth::user()->role_id)->select($selectedFields);
        $getRole                 =  $roles->first();
        $isSuperOrAdmin          =  ( $getRole->type === 'super-admin' || $getRole->type === 'admin' );
        $isRole                  =  ( $getRole->id === 1 || $getRole->id ===  2 );

        $corporateClientRole     =  $assignRole['role']['corporate-client']['type'];
        $corporateClientRoleId   =  $assignRole['role']['corporate-client']['id'];

        $individualClientRole    =  $assignRole['role']['individual-client']['type'];
        $individualClientRoleId  =  $assignRole['role']['individual-client']['id'];

        $clientRoleType          =  ($corporateClientRole   || $individualClientRole);

        $clientRoleId            =  ($corporateClientRoleId || $individualClientRoleId);
        
        
        //User role is super-admin or admin
        if ( Auth::check() && ( $isSuperOrAdmin && $isRole ) )
        {
            return $next($request);
        }

        // //If user role is corporate or individual clients
        // if( Auth::check() && ( $clientRoleType &&  $clientRoleId ) )
        // {
        //     return redirect('/dashboard');
        // }
        
        //default redirect
        return redirect('logout');

    }
    

    
}
