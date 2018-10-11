<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model 
{

    protected $table = 'skills';
    public $timestamps = true;

    public function subSkills()
    {
        return $this->hasMany('App\Sub_skills');
    }

    public function compagnies()
    {
        return $this->belongsToMany('Companies');
    }

}