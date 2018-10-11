<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActuCat extends Model 
{

    protected $table = 'actuCat';
    public $timestamps = true;

    public function page()
    {
        return $this->hasMany('App\Actu');
    }

}