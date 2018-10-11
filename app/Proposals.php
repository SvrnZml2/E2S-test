<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposals extends Model 
{

    protected $table = 'proposals';
    public $timestamps = true;
    protected $fillable = ['titre', 'type', 'description', 'companies_id', 'frequence', 'heure', 'debut', 'fin', 'sub_skills_id', 'is_valid', 'expiration', 'besoin', 'cout', 'lieu', 'materiel', 'deplacement', 'service'];

    public function subSkills()
    {
        return $this->hasOne('App\Sub_skills');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Companies');
    }

}