<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actu extends Model 
{

    protected $table = 'actu';
    public $timestamps = true;

    public function cat()
    {
        return $this->belongsTo('App\ActuCat');
    }

}