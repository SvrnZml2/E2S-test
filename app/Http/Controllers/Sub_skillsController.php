<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Sub_skillsController extends Controller 
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
  //listing des sous-compétences
  static public function getListWithSkill($comp)
  {
    $subSkills = DB::table('sub_skills')
    ->join('skills', 'skills.id', '=', 'sub_skills.skills_id')
    ->select('sub_skills.*' , 'skills.nom as cat')
    ->where('sub_skills.skills_id', '=', $comp)
    ->get();
    $compName;
    $liste= array();
    foreach($subSkills as $subSkill){
    $liste[$subSkill->id] = $subSkill->nom;
    $compName = $subSkill->cat;
    }
    $data = array();
    $data[0] = $liste;
    $data[1] = $compName;
    return $data;
    
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
  public function show($id)
  {
    
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