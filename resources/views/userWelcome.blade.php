<?php 
use App\User;

$type = Auth::user()->type;

?>

@extends('layouts.userLayout')
@section('title', 'Accueil')
@section('content')

@if($type == 0)
<!-- Message quand utilisateur type = 0 inscrit -->
<div class="row">
  <div class="col-12">
  <h1 class="text-center">Bienvenue sur votre espace de connexion</h1>
  </div>
  <div class="col-6" style="margin:auto;">
  <img src="{{asset('images/accueilvisuel.png')}}" alt="visuel accueil" height="500" width="500"/>
  </div>
  <div class="col-4">
  <p>Recherchez des annonces par compétences.</p>
  <p>Modifiez et complétez vos données de profil.</p>
  <p>Contactez-nous à tout moment.</p>
  </div>
</div>
@endif

@if($type == 1)
<!-- Message quand utilisateur type = 1 abonne -->
<div class="row">
  <div class="col-12">
  <h1 class="text-center">Bienvenue sur votre espace membre</h1>
  </div>
  <div class="col-6" style="margin:auto;">
  <img src="{{asset('images/accueilvisuel.png')}}" alt="visuel accueil" height="500" width="500"/>
  </div>
  <div class="col-4">
  <p>Recherchez des annonces dans leur intégralité.</p>
  <p>Publiez des annonces par compétences.</p>
  <p>Dialoguez entre structures abonnées depuis une annonce.</p>
  <p>Créez et stockez vos fiches récapitulatives de mutualisation.</p>
  <p>Accédez aux documents juridiques fournis par La Place.</p>
  <p>Contactez-nous à tout moment.</p>
  <p>A vous de jouer !</p>
  </div>
</div>
@endif

@endsection