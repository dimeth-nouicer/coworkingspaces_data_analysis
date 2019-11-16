<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Story;
use Tymon\JWTAuth\Contracts\JWTSubject ;
use Laratrust\Traits\LaratrustUserTrait;


use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use LaratrustUserTrait;


   // use Authenticatable, Authorizable, CanResetPassword, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function story(){
        return $this->hasOne('App/Story');
    }


    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [
            /* 'user' => [ 
                'id' => $this->id,
                //... 
             ]*/
        ];
    }



}
