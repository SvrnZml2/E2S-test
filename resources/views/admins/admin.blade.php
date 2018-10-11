@extends('layouts.adminLayout')
@section('title', 'Tableau de bord admin')
@section('content')

<div class="row">
  <div class="col-12">
  <h1 class="text-center">Bienvenue dans ton espace d'administration !</h1>
  </div>
  <div class="col-6" style="margin:auto;">
  <img src="{{asset('images/accueilvisuel.png')}}" alt="visuel accueil" height="500" width="500"/>
  </div>
  <div class="col-4">
  <p>Recherche des annonces.</p>
  <p>Modère les annonces des structures abonnées.</p>
  <p>Suis les inscriptions.</p>
  <p>Valide les abonnements.</p>
  <p>Dialogue avec les structures abonnées.</p>
  <p>Reçois les fiches récapitulatives de mutualisation.</p>
  <p>A toi de jouer !</p>
  </div>
</div>


@endsection