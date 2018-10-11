<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proposals;
use App\Companies_proposals;
use App\Sub_skills;
use App\Skills;
use App\Companies;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use App\User;

class Companies_proposalsController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

    /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  // Form creation Offre
  public function FormFicheWithOffre(Request $request)
  {
    if(isset($request->dest)){
      $dest = $request->dest;
    }
    $id=$request->proposal;
    $proposition = Proposals::find($id);
    $subSkills = Sub_skills::find($proposition->sub_skills_id);
    $comp = $subSkills->skills_id;
    $sCompID = $subSkills->id;
    $subSkills = DB::table('sub_skills')
    ->select('sub_skills.id','sub_skills.nom')
    ->where('sub_skills.skills_id', '=', $comp)
    ->get();
    $select=array();
    $liste =array();
    foreach($subSkills as $subSkill){
      if($sCompID == $subSkill->id){
        $select[$subSkill->id]= $subSkill->nom;
      }
      else{
        $liste[$subSkill->id]= $subSkill->nom;
      }
    }
    $liste = $select + $liste;
   
    $comp = Skills::find($comp);
    $compName = $comp->nom;
    
    if($proposition->frequence == 0){
      $frequence['semaine']=true;
      $frequence['mois']=false;
    }
    else{
      $frequence['semaine']=false;
      $frequence['mois']=true;
    }
    
    if($proposition->besoin == 0){
      $besoin['ponctuel']=true;
      $besoin['permanent']=false;
    }
    else{
      $besoin['ponctuel']=false;
      $besoin['permanent']=true;
    }

    if($proposition->service == 0){
      $service['prestation']=true;
      $service['disposition']=false;
    }
    else{
      $service['prestation']=false;
      $service['disposition']=true;
    }
    $recap = true;
    
    return view('proposals.updateFormOffre', compact( 'dest','proposition','menu','compName','liste','frequence','besoin','service','id','recap'));
  }

    /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  // Form creation Demande
  public function FormFicheWithDemande(Request $request)
  {
    
    $id=$request->proposal;
    $proposition = Proposals::find($id);
    $subSkills = Sub_skills::find($proposition->sub_skills_id);
    $comp = $subSkills->skills_id;
    $sCompID = $subSkills->id;
    $subSkills = DB::table('sub_skills')
    ->select('sub_skills.id','sub_skills.nom')
    ->where('sub_skills.skills_id', '=', $comp)
    ->get();
    $select=array();
    $liste =array();
    foreach($subSkills as $subSkill){
      if($sCompID == $subSkill->id){
        $select[$subSkill->id]= $subSkill->nom;
      }
      else{
        $liste[$subSkill->id]= $subSkill->nom;
      }
    }
    $liste = $select + $liste;
   
    $comp = Skills::find($comp);
    $compName = $comp->nom;
    
    if($proposition->frequence == 0){
      $frequence['semaine']=true;
      $frequence['mois']=false;
    }
    else{
      $frequence['semaine']=false;
      $frequence['mois']=true;
    }
    
    if($proposition->besoin == 0){
      $besoin['ponctuel']=true;
      $besoin['permanent']=false;
    }
    else{
      $besoin['ponctuel']=false;
      $besoin['permanent']=true;
    }


    $recap = true;
    return view('proposals.updateFormDemande', compact( 'proposition','menu','compName','liste','frequence','besoin','service','id','recap'));

  }
  
  //Fiche recap pour une Demande
  public function create_recap_demande(Request $request){
    
    
    $validator = Validator::make($request->all(), [
      'proposalId' => 'required|numeric',
      'companieId' => 'required|numeric',
      'type' => 'required|alpha',
      'titre' => 'required|string|max:180',
      'comp' => 'required|numeric',
      'description' => 'required|string',
      'debut' => 'required|date',
      'fin' => 'required|date',
      'archivage' => 'required|date',
      'frequence' => 'required|numeric|max:1',
      'heure' => 'required|numeric|max:744|min:1',
      'besoin' => 'required|numeric|max:1',
      'localisation' => 'required|string',
      'materiel' => 'required|string',
      'service' => 'required|numeric|max:1',
      'cout' => 'required|numeric|min:0',
       ]);
      
       $companieId= CompaniesController::WhoAmI();
      if ($validator->fails()) {  

        $menu = 'annonces';
        $message = "Une erreur a été détecté faite preuve de cohérence";
        return view('proposals.index', compact('message','menu'));
    }else{
      
      $proposal = Companies_proposals::create([
        'proposals_titre' => request('titre'),
        'proposals_type' => request('type'),
        'proposals_description' => request('description'),
        'proposals_frequence' => request('frequence'),
        'proposals_heure' => request('heure'),       
        'proposals_debut' => request('debut'),
        'proposals_fin' => request('fin'),
        'proposals_sub_skills' => request('comp'),
        'proposals_expiration' => request('archivage'),
        'proposals_cout' => request('cout'),
        'proposals_lieu' => request('localisation'),
        'proposals_deplacement' => request('deplacement'),
        'proposals_materiel' => request('materiel'), 
        'proposals_companies_id' => request('companieId'),
        'proposals_service' => request('service'),
        'companies_id' => $companieId,
        'match' => NULL,
        'confirmation' => NULL,
        'proposals_id' => request('proposalId'),
      ]);

      $proposal->save();

      $menu = 'proposition';
      return redirect()->route('recap_envoi');
    }  

  }
  //Fiche recap pour une Offre
  public function create_recap_offre(Request $request){
    
    
    $validator = Validator::make($request->all(), [
      'proposalId' => 'required|numeric',
      'companieId' => 'required|numeric',
      'type' => 'required|alpha',
      'titre' => 'required|string|max:180',
      'comp' => 'required|numeric',
      'description' => 'required|string',
      'debut' => 'required|date',
      'fin' => 'required|date',
      'archivage' => 'required|date',
      'frequence' => 'required|numeric|max:1',
      'heure' => 'required|numeric|max:744|min:1',
      'besoin' => 'required|numeric|max:1',
      'localisation' => 'required|string',
      'service' => 'required|numeric|max:1',
      'cout' => 'required|numeric|min:0',
      'dest' => 'required|string'
       ]);
      
       $companieId= CompaniesController::WhoAmI();
      if ($validator->fails()) {  

        $menu = 'proposition';
        $message = "Une erreur a été détecté faite preuve de cohérence";
        return view('proposals.index', compact('message','menu'));
    }else{
      
      $dest = DB::table('companies')
      
      ->join('users', 'users.id', '=', 'companies.users_id')
      ->select('companies.id')
      ->where('users.id', '=', $request->dest)
      ->get();
  
      $dest = $dest[0]->id;
      $proposal = Companies_proposals::create([
        'proposals_titre' => request('titre'),
        'proposals_type' => request('type'),
        'proposals_description' => request('description'),
        'proposals_frequence' => request('frequence'),
        'proposals_heure' => request('heure'),       
        'proposals_debut' => request('debut'),
        'proposals_fin' => request('fin'),
        'proposals_sub_skills' => request('comp'),
        'proposals_expiration' => request('archivage'),
        'proposals_besoin' => request('besoin'),
        'proposals_cout' => request('cout'),
        'proposals_lieu' => request('localisation'),
        'proposals_deplacement' => request('deplacement'),
        'proposals_materiel' => '', 
        'proposals_companies_id' => request('companieId'),
        'proposals_service' => request('service'),
        'companies_id' => $dest,
        'match' => NULL,
        'confirmation' => NULL,
        'proposals_id' => request('proposalId'),
      ]);

      $proposal->save();

      $menu = 'proposition';
      return redirect()->route('recap_envoi');
    }  

  }
  
    /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  //Envoie de la fiche recap
  public function envoi()
  {
    $uId = Auth::user()->id;
    //conversion user id => user companie
    $id = DB::table('companies')
    
    ->select('companies.*')
    ->where([['companies.users_id', '=', $uId]])
    ->get();
    $id = $id[0]->id;
    //requette de selection
    $proposals = DB::table('companies_proposals')
    
    ->select('companies_proposals.*')
    ->where([['companies_proposals.companies_id', '=', $id],['companies_proposals.match', '=', NULL]])
    ->orderBy('companies_proposals.created_at', 'desc')
    ->get();
    
    
    $recaps= array();
    
    foreach($proposals as $key => $proposal){
      $recaps[$key]['titre'] = $proposal->proposals_titre;
      if($proposal->proposals_type == 'demande'){
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      else{
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      $recaps[$key]['id'] = $proposal->id;
    }
    
    $menu = 'proposition';
    return view('recap.gestion', compact('recaps','menu'));
  }

    /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  //Reception de la fiche recap
  public function reception()
  {
    $uId = Auth::user()->id;
    //conversion user id => user companie
    $id = DB::table('companies')
    
    ->select('companies.*')
    ->where([['companies.users_id', '=', $uId]])
    ->get();
    $id = $id[0]->id;
    $proposals = DB::table('companies_proposals')
    
    ->select('companies_proposals.*')
    ->where([['companies_proposals.proposals_companies_id', '=', $id],['companies_proposals.match', '=', NULL]])
    ->orderBy('companies_proposals.created_at', 'desc')
    ->get();
    
    
    $recaps= array();
    
    foreach($proposals as $key => $proposal){
      $recaps[$key]['titre'] = $proposal->proposals_titre;
      if($proposal->proposals_type == 'demande'){
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      else{
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      $recaps[$key]['id'] = $proposal->id;
    }
    
    $menu = 'proposition';
    return view('recap.gestion', compact('recaps','menu'));
  }

    /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  //Valider la fiche recap
  public function valide()
  {
    $uId = Auth::user()->id;
    //conversion user id => user companie
    $id = DB::table('companies')
    
    ->select('companies.*')
    ->where([['companies.users_id', '=', $uId]])
    ->get();
    $id = $id[0]->id;
    //requette de selection
    $proposals = DB::table('companies_proposals')
    
    ->select('companies_proposals.*')
    ->where([['companies_proposals.companies_id', '=', $id],['companies_proposals.match', '!=', NULL]])
    ->orWhere([['companies_proposals.proposals_companies_id', '=', $id]])
    ->orderBy('companies_proposals.created_at', 'desc')
    ->get();
    
    
    $recaps= array();
    
    foreach($proposals as $key => $proposal){
      $recaps[$key]['titre'] = $proposal->proposals_titre;
      if($proposal->proposals_type == 'demande'){
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      else{
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      $recaps[$key]['id'] = $proposal->id;
    }
    
    $menu = 'proposition';
    return view('recap.gestion', compact('recaps','menu'));
  }

  // Message de validité pour fiche recap
  public function lastValid(Request $request){

    $proposal = Companies_proposals::find($request->id);
    $proposal->confirmation = date("Y-m-d");
    
    $proposal->save();
    $menu = 'proposition';
    $title ='La fiche recap a été validé';
    $msg = "Vous pouvez désormais consulter la fiche dans la section recap";
    return view('users.confirmCreate', compact('msg','menu','title'));

  }
  //
  public function recap_wait(){
    $proposals = DB::table('companies_proposals')
    
    ->select('companies_proposals.*')
    ->where([['companies_proposals.confirmation', '=', NULL],['companies_proposals.match', '!=', NULL]])
    ->orderBy('companies_proposals.created_at', 'desc')
    ->get();
    
    
    $recaps= array();
    
    foreach($proposals as $key => $proposal){
      $recaps[$key]['titre'] = $proposal->proposals_titre;
      if($proposal->proposals_type == 'demande'){
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      else{
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      $recaps[$key]['id'] = $proposal->id;
    }
    
    $menu = 'proposition';
    return view('recap.gestion', compact('recaps','menu'));

  }

  // Vue fiche recap
  public function recap(){
    $proposals = DB::table('companies_proposals')
    
    ->select('companies_proposals.*')
    ->where([['companies_proposals.confirmation', '!=', NULL],['companies_proposals.match', '!=', NULL]])
    ->orderBy('companies_proposals.created_at', 'desc')
    ->get();
    
    
    $recaps= array();
    
    foreach($proposals as $key => $proposal){
      $recaps[$key]['titre'] = $proposal->proposals_titre;
      if($proposal->proposals_type == 'demande'){
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      else{
        $companie = Companies::find($proposal->companies_id);
        $recaps[$key]['contact'] = $companie->structure;
      }
      $recaps[$key]['id'] = $proposal->id;
    }
    
    $menu = 'proposition';
    return view('recap.gestion', compact('recaps','menu'));

  }

  public function Accepter()
  {
    dd('5');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Request $request)
  {
    $admin = Auth::user()->type;
    $proprietaire = false;
    $dest = false;
    $cId= CompaniesController::WhoAmI();
    $proposal = Companies_proposals::find($request->id);
    $destname = Companies::find($proposal->proposals_companies_id);
    $destname = $destname->structure;
    $propname = Companies::find($proposal->companies_id);
    $propname = $propname->structure;
    $compnom = Sub_skills::find($proposal->proposals_sub_skills);
    $compnom = $compnom->nom;
    $proposal->proposals_sub_skills = $compnom;
    $frequence='';
    if($proposal->proposals_frequence == 0){
      $proposal->proposals_frequence='semaine';
    }
    else{
      $proposal->proposals_frequence='mois';
    }
    $service='';
    if($proposal->proposals_service == 0){
      $proposal->proposals_service='prestation';
    }
    else{
      $proposal->proposals_service='mis a disposition';
    }

    if($proposal->companies_id == $cId){
      $proprietaire = true;
    }
    if($proposal->proposals_companies_id == $cId){
      $dest = true;
    }
    $proposal->created_at = strtotime($proposal->created_at);
    $proposal->updated_at = strtotime($proposal->updated_at);
    $proposal->proposals_debut = strtotime($proposal->proposals_debut);
    $proposal->proposals_fin = strtotime($proposal->proposals_fin);
    if($proprietaire or $dest or $admin ==2){
      $menu = 'proposition';
      $message = 'La structure '.$propname.'propose à la structure '.$destname.'';
      return view('recap.show', compact('admin','recaps','menu','dest','message','destname','propname','proposal'));
    }else{
      $menu = 'proposition';
      $message = "Une erreur a été détecté";
      return view('proposals.index', compact('message','menu'));
    }
  }

    /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function conclure(Request $request)
  {
    
    $proposal = Companies_proposals::find($request->proposalId);
    $today = date("Y-m-d");
    $proposal->match = $today;
    $proposal->save();
    $menu = 'proposition';
    $title ='Votre annonce a bien été validée';
    $msg = "Votre proposition a bien été validée, l'administratrice prendra contact avec vous dès que possible";
    return view('users.confirmCreate', compact('msg','menu','title'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>