<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Proposals;
use App\Sub_skills;
use App\Skills;
use App\Http\Requests\ProposalRequest;
use Validator;

class ProposalsController extends Controller 
{


  public function __construct(){
  $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


  public function index()
  {
    $menu = 'annonces';
    $message = "Bienvenue dans l'espace d'administration de vos annonces";
    return view('proposals.index', compact('message','menu'));
    
  }


  /**
   * redirect after a search request.
   *
   * @return Response
   */
  //Annonces par compétences
  public function showBySkill($comp)
  {
    $today = date("Y-m-d");

    $subSkills = DB::table('sub_skills')
    
    ->select('sub_skills.*')
    ->where('sub_skills.skills_id', '=', $comp)
    ->get();
    

    
    $proposals = DB::table('proposals')
    
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->where('sub_skills.skills_id', '=', $comp)
    ->whereDate('proposals.expiration','>', $today)
    ->where('proposals.is_valid', '=', 1)
    ->get();

    $comps= array();
    foreach($subSkills as $subSkill){
    $subSkillSearch[$subSkill->id] = $subSkill->nom;
    }

    
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    $menu = '';
    return view('proposals.searchByComp', compact('comp','demandes','offres','subSkillSearch','menu'));
  }

  /**
   * redirect after a search request.
   *
   * @return Response
   */
  public function searchRewrite(Request $request)
  {
    $id = $request->get('comp');
    return redirect('./proposalBySkill/'.$id);
    
  }


  /**
   * redirect after a search request.
   *
   * @return Response
   */
  // Annonces par sous compétences
  public function showBySubSkill($subcomp)
  {
    $today = date("Y-m-d");
    $subSkills = Sub_skills::find($subcomp);
    $comp = $subSkills->skills_id;
    $subSkills = DB::table('sub_skills')
    
    ->select('sub_skills.id','sub_skills.nom')
    ->where('sub_skills.skills_id', '=', $comp)
    ->get();
    
    $proposals = DB::table('proposals')
    
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->where('sub_skills.id', '=', $subcomp)
    ->whereDate('proposals.expiration','>', $today)
    ->where('proposals.is_valid', '=', 1)
    ->get();

    $subSkillSearch= array();
    foreach($subSkills as $subSkill){
      $subSkillSearch[$subSkill->id] = $subSkill->nom;

    }

    
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    $menu = '';
    return view('proposals.searchBySubComp', compact('comp','demandes','offres','subSkillSearch','menu'));
  }

    /**
   * redirect after a search request.
   *
   * @return Response
   */
  //searchbar
  public function searchSubRewrite(Request $request)
  {
    $id = $request->get('subSkillSearch');
    return redirect('./proposalBySubSkill/'.$id);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  //menu annonnces
  public function create()

  {
    $menu = 'annonces';
    return view('proposals.create','menu');
  }

    /**
   * Show the form for creating a offre.
   *
   * @return Response
   */
  //Form Offre
  public function formOffre($comp)
  {
    $companieId= CompaniesController::WhoAmI();
    $skillData =  Sub_skillsController::getListWithSkill($comp);
    $liste = $skillData[0];
    $compName = $skillData[1];
    $menu = '';
    return view('proposals.createOffre', compact('compName','liste','companieId','menu'));
  }

      /**
   * Show the form for creating a offre.
   *
   * @return Response
   */
  //Form demande
  public function formDemande($comp)
  {
    
    $companieId= CompaniesController::WhoAmI();
    $skillData =  Sub_skillsController::getListWithSkill($comp);
    $liste = $skillData[0];
    $compName = $skillData[1];
    $menu = '';
    return view('proposals.createDemande', compact('compName','liste','companieId','menu'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  //Creation selon Offre ou Demande
  public function store(ProposalRequest $request)
  { 

    
    $deplacement = request('deplacement');
    if($deplacement == NULL){
      $deplacement = 0;
    }
    

    if(request('type')=='demande'){

      $validator = Validator::make($request->all(), [
        'materiel' => 'required|string'
    ]);

    if ($validator->fails()) {
        return redirect(url()->previous())
                    ->withErrors($validator)
                    ->withInput();
    }

    $proposal = Proposals::create([
      'titre' => request('titre'),
      'type' => request('type'),
      'description' => request('description'),       
      'debut' => request('debut'),
      'fin' => request('fin'),
      'expiration' => request('archivage'),
      'frequence' => request('frequence'),
      'heure' => request('heure'),
      'besoin' => request('besoin'),
      'lieu' => request('localisation'),
      'deplacement' => $deplacement,
      'materiel' => request('materiel'), 
      'is_valid' => 0,
      'sub_skills_id' => request('comp'),
      'companies_id' => request('companieId'),
      'cout' => 0,
      'service' => 0,
      ]);

      $title = "Confirmation de création de la demande";
      $msg = "Merci , nous avons bien reçu votre demande de création d'annonce, elle est en attente de validation.";
    }
    else if(request('type')=='offre'){

      $validator = Validator::make($request->all(), [
        'service' => 'required|numeric|max:1',
        'cout' => 'required|numeric|min:0'
    ]);

    if ($validator->fails()) {
        return redirect(url()->previous())
                    ->withErrors($validator)
                    ->withInput();
    }

     

      $proposal = Proposals::create([
        'titre' => request('titre'),
        'type' => request('type'),
        'description' => request('description'),       
        'debut' => request('debut'),
        'fin' => request('fin'),
        'expiration' => request('archivage'),
        'frequence' => request('frequence'),
        'heure' => request('heure'),
        'besoin' => request('besoin'),
        'lieu' => request('localisation'),
        'deplacement' => $deplacement, 
        'materiel' => '', 
        'is_valid' => 0,
        'sub_skills_id' => request('comp'),
        'companies_id' => request('companieId'),
        'cout' => request('cout'),
        'service' => request('service'),
        ]);

        $title = "Confirmation de création de l'offre";
        $msg = "Merci , nous avons bien reçu votre demande de création d'annonce, elle est en attente de validation.";

    }else{

      $title = "erreur";
      $msg = "Attention une erreur est survenue";

    }
  

      $menu = '';
      return view('users.confirmCreate', compact('title', 'msg','menu')); 
  }



    /**
   * Display the specified resource.
   *
   * @param  request $request
   * @return View
   */
  //form Offre
  public function updateFormOffre(request $request)
  {
    
    $id=$request->proposalId;
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
    
    return view('proposals.updateFormOffre', compact( 'proposition','menu','compName','liste','frequence','besoin','service','id'));

  }

      /**
   * Display the specified resource.
   *
   * @param  request $request
   * @return View
   */
  //Form Demande
  public function updateFormDemande(request $request)
  {
    $id=$request->proposalId;
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


    
    return view('proposals.updateFormDemande', compact( 'proposition','menu','compName','liste','frequence','besoin','service','id'));

  }
  //Si validé
  public function valid(Request $request){
    $proposal = Proposals::find($request->proposalId);
    $proposal->is_valid = 0;
    $proposal->save();
    $menu = 'annonces';
    return redirect()->route('proposalUnvalidAdmin');
  }
  //si unvalidé
  public function unvalid(Request $request){
    $proposal = Proposals::find($request->proposalId);
    $proposal->is_valid = 1;
    $proposal->save();
    $menu = 'annonces';

    return redirect()->route('proposalUnvalidAdmin');
  }
  //modif Offre
  public function updateOffre(Request $request){

    
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
      'cout' => 'required|numeric|min:0'
       ]);

       
      if ($validator->fails()) {  

        $menu = 'annonces';
        $message = "Une erreur a été détecté faite preuve de cohérence";
        return view('proposals.index', compact('message','menu'));
    }else{


      $proposal = Proposals::find($request->proposalId);
      $proposal->titre = $request->titre;
      $proposal->type = $request->type;
      $proposal->description = $request->description;
      $proposal->frequence = $request->frequence;
      $proposal->heure = $request->heure;
      $proposal->debut = $request->debut;
      $proposal->fin = $request->fin;
      $proposal->sub_skills_id = $request->comp;
      $proposal->is_valid = 0;
      $proposal->expiration = $request->archivage;
      $proposal->besoin = $request->besoin;
      $proposal->cout = $request->cout;
      $proposal->lieu = $request->localisation;
      $proposal->materiel = '';
      $proposal->deplacement = $request->deplacement;
      $proposal->service = $request->service;

      $proposal->save();

      $menu = 'annonces';
      return redirect()->route('proposalAttente');
    }  
  }
  //modif Demande
  public function updateDemande(Request $request){

    
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
      'materiel' => 'required|string'
       ]);

       
      if ($validator->fails()) {  

        $menu = 'annonces';
        $message = "Une erreur a été détecté faite preuve de cohérence ou remplissez tous les champs";
        return view('proposals.index', compact('message','menu'));
    }else{


      $proposal = Proposals::find($request->proposalId);
      $proposal->titre = $request->titre;
      $proposal->type = $request->type;
      $proposal->description = $request->description;
      $proposal->frequence = $request->frequence;
      $proposal->heure = $request->heure;
      $proposal->debut = $request->debut;
      $proposal->fin = $request->fin;
      $proposal->sub_skills_id = $request->comp;
      $proposal->is_valid = 0;
      $proposal->expiration = $request->archivage;
      $proposal->besoin = 0;
      $proposal->cout = 0;
      $proposal->lieu = $request->localisation;
      $proposal->materiel = $request->materiel;
      $proposal->deplacement = $request->deplacement;
      $proposal->service = 0;

      $proposal->save();

      $menu = 'annonces';
      return redirect()->route('proposalAttente');
    }
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

    /**
   * affiche les  offres.
   *
   * @param  int  $id
   * @return Response
   */
  //afficher offre selon id
  public function voir_offre($id)
  { $proprietaire = false;
    $idUser = Auth::user()->id;
    $typeUser = Auth::user()->type;
    $offre = DB::table('proposals')
    
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','companies.users_id as userId','skills.nom as compNom','sub_skills.nom as subName')
    ->where('proposals.id', '=', $id)
    ->get();
    if($offre != NULL){
    $offre=$offre[0];
      if ($offre->userId == $idUser){
        $proprietaire = true;
      }
    }

    
    if($offre != NULL and $typeUser==2 or $offre->is_valid > 0 or $offre->userId == $idUser  and $offre->type == 'offre'){
      $offre->updated_at = strtotime($offre->updated_at);
      $offre->debut = strtotime($offre->debut);
      $offre->fin = strtotime($offre->fin);
      if($offre->frequence == 0){
        $offre->frequence = 'semaine(s)';
      }else{
        $offre->frequence = 'mois';
      }

      if($offre->besoin == 0){
        $offre->besoin = 'ponctuel';
      }else{
        $offre->besoin = 'permanent ';
      }

      if($offre->service == 0){
        $offre->service = 'prestation';
        $offre->cout = $offre->cout . 'euros';
      }else{
        $offre->service = 'mis a disposition';
        $offre->cout = $offre->cout . "euros de l'heure";
      }
      $menu = '';
      
      return view('proposals.voirOffre', compact('offre','me  nu','proprietaire'));
   
  }else{
    $erreur = "Une erreur a été détectée dans le numéro de l'offre, elle n'est pas encore en cours de publication ou n'existe pas";
    $menu = '';
    return view('companies.erreur', compact('erreur','menu'));
  }

  }

    /**
   * affiche les demandes.
   *
   * @param  int  $id
   * @return Response
   */
  // demande selon id
  public function voir_demande($id)
  {
    $proprietaire = 0;
    $idUser = Auth::user()->id;
    $typeUser = Auth::user()->type;
    $demande = DB::table('proposals')
    
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','companies.users_id as userId','skills.nom as compNom','sub_skills.nom as subName')
    ->where('proposals.id', '=', $id)
    ->get();
    if($demande != NULL){
    $demande=$demande[0];
    if ($demande->userId == $idUser){
      $proprietaire = 1;
    }
  }
     
    if($demande != NULL and $typeUser==2 or $demande->is_valid > 0 or $demande->userId == $idUser and $demande->type == 'demande'){
      $demande->updated_at = strtotime($demande->updated_at);
      $demande->debut = strtotime($demande->debut);
      $demande->fin = strtotime($demande->fin);
      if($demande->frequence == 0){
        $demande->frequence = 'semaine(s)';
      }else{
        $demande->frequence = 'mois';
      }

      if($demande->besoin == 0){
        $demande->besoin = 'ponctuel';
      }else{
        $demande->besoin = 'permanent ';
      }

      if($demande->service == 0){
        $demande->service = 'prestation';
        $demande->cout = $demande->cout . 'euros';
      }else{
        $demande->service = 'mis a disposition';
        $demande->cout = $demande->cout . "euros de l'heure";
      }
      $menu = '';
      return view('proposals.voirDemande', compact('demande','menu','proprietaire'));
   
  }else{
    $erreur = "Une erreur a été détectée dans le numéro de la demande, elle n'est pas encore en cours de publication ou n'existe pas";
    $menu = '';
    return view('companies.erreur', compact('erreur','menu'));
    
  }
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
  //suppression
  public function destroy(request $request)
  {
    $id=$request->proposalId;
    $proposition = Proposals::find($id);
    $proposition->delete();
    $menu = 'annonces';
    $message = "Votre annonce a été suprimé";
    return view('proposals.index', compact('message','menu'));
  }

  //en attente
  public function  attente(){

    $id = Auth::user()->id;
    $proposals = DB::table('proposals')
    
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->where([['companies.users_id', '=', $id],['proposals.is_valid', '=', 0]])
    ->orderBy('proposals.created_at', 'desc')
    ->get();
    
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    
    $menu = 'annonces';
    return view('proposals.gestion', compact('demandes','offres','menu'));
  }
  //attente admin
  public function  adminWait(){

    $proposals = DB::table('proposals')
    
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->where([['proposals.is_valid', '=', 0]])
    ->orderBy('proposals.created_at', 'desc')
    ->get();
    
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    
    $menu = 'annonces';
    return view('proposals.gestion', compact('demandes','offres','menu'));

  }
  //show proposition
  public function  publie(){
    $id = Auth::user()->id;
    $today = date("Y-m-d");
    $proposals = DB::table('proposals')
    
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->where([['companies.users_id', '=', $id],['proposals.is_valid', '=', 1]])
    ->whereDate('proposals.expiration','>', $today)
    ->orderBy('proposals.created_at', 'desc')
    ->get();
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    $menu = 'annonces';
    return view('proposals.gestion', compact('demandes','offres','menu'));
  }
  //show admin proposition
  public function  publieAdmin(){
    $id = Auth::user()->id;
    $today = date("Y-m-d");
    $proposals = DB::table('proposals')
    
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->where([['proposals.is_valid', '=', 1]])
    ->whereDate('proposals.expiration','>', $today)
    ->orderBy('proposals.created_at', 'desc')
    ->get();
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    $menu = 'annonces';
    return view('proposals.gestion', compact('demandes','offres','menu'));
  }
  
  //proposition archivé
  public function  archive(){
    $id = Auth::user()->id;
    $today = date("Y-m-d");
    $proposals = DB::table('proposals')
    
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->where([['companies.users_id', '=', $id]])
    ->whereDate('proposals.expiration','<', $today)
    ->orderBy('proposals.created_at', 'desc')
    ->get();
    
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    
    $menu = 'annonces';
    return view('proposals.gestion', compact('demandes','offres','menu'));
  }
  //Propo admin archivé
  public function  adminArchive(){
    $id = Auth::user()->id;
    $today = date("Y-m-d");
    $proposals = DB::table('proposals')
    
    ->select('proposals.*','proposals.id as proposalId','companies.nom as structNom','skills.nom as compNom','sub_skills.nom as subName')
    ->join('companies', 'companies.id', '=', 'proposals.companies_id')
    ->join('sub_skills', 'sub_skills.id', '=', 'proposals.sub_skills_id')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->whereDate('proposals.expiration','<', $today)
    ->orderBy('proposals.created_at', 'desc')
    ->get();
    
    $offres= array();
    $demandes= array();
    foreach($proposals as $proposal){
      $datetime1 = date_create($proposal->debut);
      $datetime2 = date_create($proposal->fin);
      $proposal->updated_at = strtotime($proposal->updated_at);
      $proposal->duree = date_diff($datetime1, $datetime2);
      if($proposal->type == 'demande'){
        array_push($demandes, $proposal);
      }else{
        array_push($offres, $proposal);
      }
    }
    
    $menu = 'annonces';
    return view('proposals.gestion', compact('demandes','offres','menu'));
  }

  
}

?>