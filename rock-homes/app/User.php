<?php

namespace App;

use DB;
use Auth;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Authenticatable implements AuthenticatableContract, CanResetPasswordContract
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
    *
     * @var array
     */
    protected $fillable = [
        'role_id', 'client_id', 'branch_id', 'first_name', 'middle_name', 
        'last_name', 'full_name','email', 'password', 'tenant_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role_id', 'client_id', 'tenant_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function isAdmin() 
    {
        
        $roles            =   [  config('app.admin') => 'admin',  config('app.finance') => 'finance', ];
        $isAdminRole      =   static::getUserRole(Auth::user()->role_id);
        $is_role_id       =   in_array( $isAdminRole, array_keys($roles)) ? $isAdminRole : $this->isClient();
        
        return $this->role_id === $is_role_id;
        
    }
    
    public function isClient() 
    {
        
        $roles            =   [ 3 => 'individual-client', 5 => 'corporate-client' ];
        $isClientRole     =   static::getUserRole(Auth::user()->role_id);
        $is_role_id       =   in_array( $isClientRole, array_keys($roles)) ? $isClientRole : $this->isAdmin();

        return $this->role_id === $is_role_id ;

    }

    public static function getUserRole($role_id)
    {

        $role  =  DB::table('tblrole')->where('id', $role_id)->get()->toArray();
        foreach ($role as $key => $value) {
            # code...
            return  $value->id;
        }
    }

     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }

    

}
