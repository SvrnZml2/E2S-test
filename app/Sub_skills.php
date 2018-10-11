<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_skills extends Model 
{

    protected $table = 'sub_skills';
    public $timestamps = true;

    public function skills()
    {
        return $this->hasOne('App\Skills');
    }

    public function proposals()
    {
        return $this->belongsToMany('Proposals');
    }

}