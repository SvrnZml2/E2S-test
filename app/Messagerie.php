<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model 
{

    protected $table = 'messagerie';
    public $timestamps = true;
    protected $fillable = ['objet','message','id_user','id_dest','id_proposal','is_view','is_purpose'];

    public function users()
    {
        return $this->belongsTo('App\Users', 'id_user');
    }

    public function dest()
    {
        return $this->belongsTo('App\Users', 'id_dest');
    }

    public function proposals()
    {
        return $this->hasOne('App\Proposals', 'id_proposal');
    }

}