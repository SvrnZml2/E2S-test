<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies_proposals extends Model 
{

    protected $table = 'companies_proposals';
    protected $fillable = ['created_at', 'updated_at', 'match', 'confirmation', 'companies_id', 'proposals_id', 'proposals_titre', 'proposals_type', 'proposals_description', 'proposals_companies_id', 'proposals_frequence', 'proposals_heure', 'proposals_debut', 'proposals_fin', 'proposals_sub_skills', 'proposals_cout', 'proposals_lieu', 'proposals_materiel', 'proposals_deplacement', 'proposals_service', 'proposals_expiration', 'proposals_besoin'];
    public $timestamps = true;

}