<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserRole
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
        $selectedFields  =  ['id', 'type' ];
        $roles           =  DB::table('tblrole')->where('id', Auth::user()->role_id)->select($selectedFields);
        $getRole    = $roles->first();
        $isAdmin    = ( $getRole->type === 'admin'  );
        $isRole         = ( $getRole->id ===  config('app.admin') );

        if ( !( $isAdmin ) && !( $isRole ) ) {
            abort(401);

        }

        return $next($request);
    }
}