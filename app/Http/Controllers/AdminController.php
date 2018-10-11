<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Controllers\CompaniesController;
use Auth;
use App\Companies;
use App\User;
use Image;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class AdminController extends Controller
{
    const JM_EXPIRE = '31 mars ';

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //Dashboard Admin
    public function index()
    {
        return view('admins.admin');
    }

    //Menu profil
    public function showProfil()
    {
        $menu = 'donnee';
        return view('admins.admin', compact('menu'));
    }

    // Liste des inscrits
    public function indexInscrits()
    {
        $id = Auth::user()->id;

        $utilisateurs = DB::table('companies')
        ->select('companies.*', 'users.*')
        ->where('type', '=', 0)
        ->join('users', 'users.id', '=', 'companies.users_id')
        ->orderBy('users.created_at', 'desc')
        ->paginate(10);

        $menu = 'structures';
        return view('admins.inscrits', compact('utilisateurs', 'menu'));
    }

    // Liste des abonnes
    public function indexAbonnes()
    {
        $id = Auth::user()->id;

        $utilisateurs = DB::table('companies')
        ->select('companies.*', 'users.*')
        ->where('type', '=', 1)
        ->join('users', 'users.id', '=', 'companies.users_id')
        ->orderBy('users.created_at', 'desc')
        ->paginate(10);

        $menu = 'structures';
        return view('admins.abonnes', compact('utilisateurs', 'menu'));
    }

    // Liste des demandes d'abonnements
    public function indexDemandes()
    {
        $id = Auth::user()->id;

        $utilisateurs = DB::table('companies')
        ->select('companies.*', 'users.*')
        ->where('demande', '=', 1)
        ->join('users', 'users.id', '=', 'companies.users_id')
        ->orderBy('users.created_at', 'desc')
        ->paginate(10);

        $menu = 'structures';
        return view('admins.demande', compact('utilisateurs', 'menu'));
    }

    // Afficher le profil de l'utilisateur
    public function showUtilisateur($id)
    {
        $utilisateur = DB::table('companies')
        ->join('users', 'users.id', '=', 'companies.users_id')
        ->where('companies.users_id', '=', $id)
        ->select('companies.*', 'users.email', 'users.avatar')
        ->first();

        $menu ='structures';
        return view('admins.show', compact('utilisateur', 'menu'));
    }

    // Afficher le profil de l'admin
    public function showAdmin()
    {
        $id = Auth::user()->id;
         $utilisateur = DB::table('companies')
         ->join('users', 'users.id', '=', 'companies.users_id')
         ->where('companies.users_id', '=', $id)
         ->select('companies.*', 'users.email', 'users.avatar')
         ->first();

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

         $menu ='donnee';
         return view('admins.showAdmin', compact('utilisateur', 'menu'));
    }

    // View le profil de l'admin
    public function editProfil()
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


        $menu ='donnee';
        return view('admins.editProfil', compact('utilisateur', 'menu')); 
    }

    // Update du profil Admin
    public function update(Request $request)
  {
    $id= Auth::id();
    $id= User::find($userId = Auth::id());

    $validator = Validator::make($request->all(), [
        'structure' => 'bail|required|min:3|max:20|string',
        'statut' => 'bail|required|min:3|max:20|string',
        'budget' => 'bail|required|numeric',
        'etp' => 'bail|required|min:0|max:100|numeric',
        'rue' => 'bail|required|min:3|max:50|string',
        'postal' => 'bail|required|max:100000|numeric',
        'ville' => 'bail|required|min:3|max:20|alpha',
        'name' => 'bail|required|min:3|max:20|string',
        'prenom' => 'bail|required|min:3|max:20|string',
        'telephone' => 'bail|required|min:11|max:0989999999|numeric',
        'email' => 'bail|required|email',
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

            Image::make($avatar)->resize(150, 150)->save(public_path("images/") . $filename);

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

        return redirect('/profilAdministrateur');
    }
  }

    // user devient abonne
    public function updateRole($id)
    {
        // récupère la date d'aujourd'hui
        $datejour = date('d/m/Y');
        //récupère l'année de la date d'aujourd'hui
        $yearjour = date('Y');
        // année ++
        $yearjours = date('Y') + 1;
        // update de année ++ = finabo

        DB::table('users')->where('id', $id)->update(['demande' => 0, 'type' => 1, 'finabo' => $yearjours]);

        return redirect()->action('AdminController@indexAbonnes');
    }

    // function vérifier les abonnements
    public function verifAbonnement()
    {
        // récupère la date d'aujourd'hui
        $datejour = date('d-m-Y');
        
        //Transforme date du jour en timestamp
        $verifjour  = strtotime($datejour);
       
        // récupère l'année en cours
        $yearjour = date('Y');
        
        // année en cours ++
        $yearjours = date('Y') + 1;
        
        //récupère la finabo de la base
        $finabos = DB::table('users')
        ->select('users.id', 'users.finabo', 'users.type')
        ->get();

        //verif abonnement avant le 31 MARS
        $beforeverif = self::JM_EXPIRE . $yearjour;
        
        //strtotime de $beforeverif
        $verif = strtotime($beforeverif);

        $count = 0;

        foreach ($finabos as $expire) {
            if ($verifjour > $verif) {
                // après 31 mars
                // vérification par rapport à l'année suivante

                if ($expire->finabo < $yearjours and $expire->type == 1) {
                    $push =  DB::table('users')->where('users.id', '=', $expire->id)->update(['type' => 0]);
                    $count++;
                } 
            } // fin de if $verifjour
            else {
                // avant le 31 mars de l'année en cours
                // vérification par rapport à l'année en cours 
                if ($expire->finabo < $yearjour and $expire->type == 1) {
                    $push =  DB::table('users')->where('users.id', '=', $expire->id)->update(['type' => 0]);
                    $count++;
                } 
            }
        } // fin de foreach
    $menu = 'structures';
    
    $title = "Vérification des abonnements des utilisateurs";
    $msg = "Il y a " . $count . " abonnement(s) rétrogradé(s).";

    return view('admins.confirme', compact('title', 'msg', 'menu'));  
    } // fin de verifAbonnement

    // function renouveler l'abonnement d'un utilisateur
    public function renewAbonnement($id)
    {
        //récupère l'année de la date d'aujourd'hui
        $yearjour = date('Y');
        // année ++
        $yearjours = date('Y') + 1;

        DB::table('users')->where('id', $id)->update(['finabo' => $yearjours]);

        $menu = 'structures';
    
        $title = "Renouvelement de l'abonnement de la structure";
        $msg = "L'abonnement de la structure a bien été renouvelée.";

        return view('admins.confirme', compact('title', 'msg', 'menu'));  
    }

    // view convention
    public function convention()
    {
      $menu = 'document';
      return view('admins.convention', compact('menu'));
    }

    // view avenant
    public function avenant()
    {
      $menu = 'document';
      return view('admins.avenant', compact('menu'));
    }


}