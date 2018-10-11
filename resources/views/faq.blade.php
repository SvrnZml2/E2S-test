@extends('layouts.layout')

@section('title', "Les FAQ")

@section('content')
<br>
<div class="container">
    <div class="row">
        <img src="{{asset('images/FAQ.png')}}" alt="Faq"/><h1 class="mx-3 my-2">FAQ</h1>
        <div class="col-12 mt-3">
            <p>La Foire aux questions est une page en cours de construction.</p>
            <p>Au cours de la phase test du service La Place, nous relevons l'ensemble de vos questions pour pouvoir créer cette page.</p>
            <p>Cette rubrique regroupera l'ensemble des réponses aux questions les plus fréquemment posées.</p>
            <p>En attendant, vous pouvez nous contacter via le formulaire de contact pour toute question.</p>
            <p>Celui-ci comprend quatre objets pour nous aiguiller sur votre demande :</p>
            <ul>
                <li>&bull; Prenez contact avec nous</li>
                <li>&bull; Votre avis nous intéresse</li>
                <li>&bull; Vous rencontrez un problème</li>
                <li>&bull; Autres.</li>
            </ul>
            <p>Merci pour votre compréhension.</p>
        </div>

   

    </div> <!-- ./row -->              
</div> <!-- ./container -->
<br>
@endsection
