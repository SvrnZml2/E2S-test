<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;

class CompaniesController extends Controller 
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
   * give id for auth user.
   *
   * @return Response
   */
  static public function WhoAmI()
  {
    $userId = Auth::id();
    $companieId = DB::table('companies')
    
    ->join('users', 'users.id', '=', 'companies.users_id')
    ->select('companies.id')
    ->where('users.id', '=', $userId)
    ->get();

    $companieId = $companieId[0]->id;
    return $companieId;

  }

  /**
   * give structure name for auth user.
   *
   * @return Response
   */
  static public function WhoIsMyStruct()
  {
    $userId = Auth::id();
    $companieStructure = DB::table('companies')

    ->join('users', 'users.id', '=', 'companies.users_id')
    ->select('companies.structure')
    ->where('users.id', '=', $userId)
    ->get();

    $companieStructure = $companieStructure[0]->structure;
    return $companieStructure;

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