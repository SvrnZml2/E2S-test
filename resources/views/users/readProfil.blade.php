@extends('layouts.userLayout')

@section('title', 'Votre profil')

@section('content')

         
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div id="infoProfil" class="card card-inverse">
                <div class="card-block">
    <!-- info STRUCTURE -->
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <h2 id="structureTitle" class="card-title text-left">{{  $utilisateur->structure }}</h2>
                <h5 class="card-text text-left"><strong>Statut: </strong> {{  $utilisateur->statut }}</h5>
                <h5 class="card-text text-left"><strong>Budget: </strong> {{  $utilisateur->budget}}<span> € </span> </h5>
                <h5 class="card-text text-left"><strong>N° SIRET: </strong> {{  $utilisateur->siret}}</h5>
                <h5 class="card-text text-left"><strong>Nb ETP: </strong> {{  $utilisateur->etp}}</h5>
        </div>
        <!-- info STRUCTURE adresse -->
        <div class="col-md-4 col-sm-4">
                <br />
                <br />
                <h5 class="card-text text-left"><strong>Adresse: </strong>{{  $utilisateur->rue}}</h5>
                <h5 class="card-text text-left"><strong>Code postal: </strong> {{  $utilisateur->postal}}</h5>
                <h5 class="card-text text-left"><strong>Ville: </strong> {{  $utilisateur->ville}}</h5>
        </div>
        <!-- avatar -->
        <div class="col-md-4 col-sm-4 text-center">
            <img class="btn-md" src="{{ Auth::user()->avatar }}" alt="logo" style="border-radius:50%;">
        </div>     

        <div class="col-md-12 col-sm-12">
            <br />
            <br />
        </div>
        <!-- info PERSONNE -->
        <div class="col-md-4 col-sm-4 text-center">    
            <h5 class="card-text text-left"><strong>Nom:</strong> {{  $utilisateur->nom}}</h5>     
            <h5 class="card-text text-left"><strong>Prénom: </strong> {{  $utilisateur->prenom}}</h5>         

        </div>
        <!-- info COORDONNEES -->
        <div class="col-md-4 col-sm-4 text-center">   
            <h5 class="card-text text-left"><strong>Tel: </strong> {{  $utilisateur->telephone}}</h5>     
            <h5 class="card-text text-left"><strong>Mail: </strong> {{  $utilisateur->email}}</h5>            
        </div>
        <!-- info site -->
        <div class="col-md-4 col-sm-4 text-center">  
            <h5 class="card-text">{{  $utilisateur->url}}</h5>  
            @if (Auth::user()->type === 1 )
            <h5 class="card-text text-left"><strong>Date de fin d'abonnement: </strong> {{  $utilisateur->finabo}}</h5>  
            @endif
            <a href="{{ route('editProfil') }}" class="btn btn-warning btn-block" role="button">Modifier votre profil</a>            
        </div>

</div>
</div>
</div>
</div>
</div> 
</div>
@endsection


