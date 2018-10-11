<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    const ADMIN_TYPE = 2;
    const ABONNE_TYPE = 1;
    const DEFAULT_TYPE = 0;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name', 'avatar', 'email', 'type', 'demande', 'password', 'finabo',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies(){
        return $this->belongsTo('App\Companies', 'users_id');     
    }

    /**
     * Admin 
     */

    public function isAdmin(){        
        return $this->type === self::ADMIN_TYPE;    
    }

}
