<?php 

namespace App\Http\Controllers;

use App\Companies;
use App\User;
use Auth;
use Image;
use Validator;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller 
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function index()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  
  public function show()
  {
    $id = Auth::user()->id;

    $utilisateur = DB::table('companies')
            ->where('companies.users_id', '=', $id )
            ->join('users', 'users.id', '=', 'companies.users_id')
            ->select('companies.*', 'users.email', 'users.avatar', 'users.finabo')
            ->get();

            $utilisateur = $utilisateur[0];

            if($utilisateur->budget == 0)
            {
              $utilisateur->budget = '';
            }

            if ($utilisateur->siret == 0) {
                $utilisateur->siret = '';
            }

            if($utilisateur->postal == 0)
            {
              $utilisateur->postal = '';
            }

            if($utilisateur->telephone == 0)
            {
              $utilisateur->telephone = '';
            }

            if($utilisateur->etp == 0)
            {
              $utilisateur->etp = '';
            }

            if($utilisateur->finabo == 0)
            {
              $utilisateur->finabo = '';
            }

            $menu ='profil';
            return view('users.readProfil', compact('utilisateur','menu')); 
            /* la fonction compact équivaut à array('posts' => $posts) */
}

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit()
    {   
      $id = Auth::user()->id;

      $utilisateur = DB::table('companies')
              ->where('companies.users_id', '=', $id )
              ->join('users', 'users.id', '=', 'companies.users_id')
              ->select('companies.*', 'users.email', 'users.avatar')
              ->get();

              $utilisateur = $utilisateur[0];

            if($utilisateur->budget == 0)
            {
              $utilisateur->budget = NULL;
            }

              if ($utilisateur->siret == 0) {
                $utilisateur->siret = NULL;
            }

            if($utilisateur->postal == 0)
            {
              $utilisateur->postal = NULL;
            }

            if($utilisateur->telephone == 0)
            {
              $utilisateur->telephone = '';
            }

            if($utilisateur->etp == 0)
            {
              $utilisateur->etp = NULL;
            }

            $menu ='profil';

            return view('users.editProfil', compact('utilisateur','menu')); 
    }

  /**
   * Update the specified resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @param  
   * @return Response
   */

  public function update(Request $request)
  {
    $id= Auth::id();
    $id= User::find($userId = Auth::id());

    $validator = Validator::make($request->all(), [
      'structure' => 'required|min:3|max:20|string',
      'statut' => 'required|min:3|max:20|string',
      'budget' => 'required|numeric',
      'etp' => 'required|numeric',
      'siret' => 'numeric',
      'rue' => 'required|min:3|max:50|string',
      'postal' => 'required|max:100000|numeric',
      'ville' => 'required|min:3|max:20|alpha',
      'name' => 'required|min:3|max:20|string',
      'prenom' => 'required|min:3|max:20|string',
      'telephone' => 'required|min:11|max:0989999999|numeric',
      'email' => 'required|email',
      'url' => 'url',
      'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
  ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    } 
    else{
        //référence table users
        $userId = Auth::id();
        $userId = User::find($userId = Auth::id());

        $userId->email = request('email');
        $userId->name = request('name');


        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(150, 150)->save(public_path("images/") .$filename);

            $user = Auth::user();
            $user->avatar = '../public/images/' . $filename;
            $user->save();
        }

        //Référence table companies
        $companieId = CompaniesController::WhoAmI();
        $companie = Companies::find($companieId = CompaniesController::WhoAmI());

        $companie->structure = request('structure');
        $companie->statut = request('statut');
        $companie->budget = request('budget');
        $companie->siret = request('siret');
        $companie->rue = request('rue');
        $companie->postal = request('postal');
        $companie->ville = request('ville');
        $companie->nom = request('name');
        $companie->prenom = request('prenom');
        $companie->telephone = request('telephone');
        $companie->etp = request('etp');
        $companie->url = request('url');
    
    
        //update data
        $userId->save();
        $companie->save();
        return redirect('/home');
    }
  }

  /**
   * 
   *
   * View delete profil user
   * 
   */
  public function users()
  {
    
    $id = Auth::user()->id;

    $utilisateurs = DB::table('companies')
            ->where('companies.users_id', '=', $id )
            ->join('users', 'users.id', '=', 'companies.users_id')
            ->select('companies.*', 'users.email', 'users.avatar')
            ->get();
            $menu = 'profil';
            return view('users.deleteProfil', compact('utilisateurs','menu')); 
  }
    
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
    {
      
      if($id != Auth::user()->id)
      {
        return redirect('/accueil');
      }
      
     DB::table('users')->where('id', $id)->delete();
        return redirect('/accueil');
    }

    // view charte engagement
    public function charte()
    {
      $menu = 'profil';
      return view('users.charteEngagement', compact('menu'));
    }

    // demande d'abonnement pour user
    public function askSubscription()
    {
      $id = Auth::user()->id;
      DB::table('users')->where('id', $id)->update(['demande' => 1]);
                      
      $menu = 'profil';
      
      $title = "Confirmation de votre demande d'abonnement";
      $msg = "Merci, nous avons bien reçu votre demande d'abonnement au service La Place, vous recevrez un message de confirmation, dans les plus brefs délais.";

      return view('users.confirmCreate', compact('title', 'msg', 'menu'));   
    }

    // view convention
    public function convention()
    {
      $menu = 'document';
      return view('users.modeleconvention', compact('menu'));
    }

    // view avenant
    public function avenant()
    {
      $menu = 'document';
      return view('users.modeleavenant', compact('menu'));
    }
    
}

?>