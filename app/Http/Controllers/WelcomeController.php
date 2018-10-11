<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposals;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $proposals = DB::table('proposals')
    
        ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
        ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
        ->join('companies', 'companies.id', '=', 'proposals.companies_id')
        ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
        ->where('proposals.is_valid', '=', 1)
        ->orderBy('proposals.updated_at')
        ->limit(3)
        ->get();
        

        foreach($proposals as $key => $proposal){
        $annonce[$key]['titre'] = $proposal->titre;
        $annonce[$key]['type'] = $proposal->type;
        $annonce[$key]['competence'] = $proposal->compNom;
        $annonce[$key]['sousCompetence'] = $proposal->subName;
        $annonce[$key]['description'] = mb_strimwidth($proposal->description, 0, 100, "...");
        $datetime1 = date_create($proposal->debut);
        $datetime2 = date_create($proposal->fin);
        $annonce[$key]['duree'] = date_diff($datetime1, $datetime2);
        }

        return view('welcome',compact('annonce'));
    }

    //view structure
    public function structure()
    {
        return view('structures');
    }

    //view La Place
    public function service()
    {
        return view('laplace');
    }

    //view Le Pole
    public function assoc()
    {
        return view('lepole');
    }

    //view Nos partenaires
    public function partenassoc()
    {
        return view('lespartenaires');
    }

    //view Nos partenaires
    public function misedispo()
    {
        return view('lamiseadisposition');
    }

    //view Mention légale
    public function mention()
    {
        return view('mentionlegale');
    }

    //view FAQ
    public function showFaq()
    {
        return view('faq');
    }

    //view CGU
    public function showCgu()
    {
        return view('cgu');
    }

    //view CGV
    public function showCgv()
    {
        return view('cgv');
    }
}
