<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected $fillable = ['siret', 'nom', 'prenom', 'structure', 'url', 'ville', 'postal', 'rue', 'telephone', 'statut', 'budget', 'users_id'];
    public $timestamps = true;

    public function skills()
    {
        return $this->belongsToMany('App\Skills');
    }

    public function proposals()
    {
        return $this->belongsToMany('App\Proposals');
    }

    public function users()
    {
        return $this->hasOne('App\Users', 'users_id');
    }
}