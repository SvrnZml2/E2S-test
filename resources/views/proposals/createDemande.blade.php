@extends('layouts.userLayout')
@section('title')
Créer une demande
@endsection
@section('content')
<?php $element = 'demande'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ __("Créer une Demande") }}</h1>
                    <p>Complétez le formulaire pour créer votre demande.</p>
                    <p>Une structure intéressée par votre demande vous contactera.</p>
                    <p>Vous recevrez le message de cette structure sur votre espace membre.</p>
                    <ul>
                        <li>&ndash; Soit l'offre proposée correspond à votre demande et vous pouvez autoriser la structure offreuse à générer une fiche récapitulative directement.</li>
                        <li>&ndash; Soit vous engagez une discussion pour adapter l'offre à la demande et la structure offreuse devra revenir à cette annonce pour générer la fiche récapitulative.</li>
                    </ul>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_demande') }}">
                        @csrf
                        {!! Form::hidden('companieId', $companieId) !!}
                        <div class="row justify-content-left"><h4>Renseignements sur la proposition<h4></div>
                        <!-- label type -->
                        <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('typeL', 'Type :') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('type2L', $element) !!}
                        {!! Form::hidden('type', $element) !!}
                        </div>
                        </div>

                        <!-- label Titre -->
                        <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('titreL', 'Entrez un titre : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::text('titre', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label cat -->
                        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('catL', 'Catégorie :') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('catL', $compName) !!}
                        </div>
                        </div>
                        

                        <!-- label Compétence -->
                        <div class="form-group {!! $errors->has('comp') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('competenceL', 'Choisissez une compétence') !!}
                        </div>
                        <div class="col-md-6">
                         {!! Form::select('comp', $liste);!!}

                        {!! $errors->first('comp', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>
                        
                        <!-- label description -->
                        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('descriptionL', "Description de l'annonce: ") !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label debut -->
                        <div class="form-group {!! $errors->has('debut') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('debutL', 'Sélectionnez la date de début de mission: ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::date('debut', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

                        {!! $errors->first('debut', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label fin -->
                        <div class="form-group {!! $errors->has('fin') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('finL', 'Sélectionnez la date de fin de mission: ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::date('fin', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

                        {!! $errors->first('fin', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label archivage -->
                        <div class="form-group {!! $errors->has('archivage') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('archivageL', "Sélectionnez la date d'expiration de l'annonce:" ) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::date('archivage', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

                        {!! $errors->first('archivage', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label fréquence -->
                        <div class="form-group {!! $errors->has('frequence') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('frequenceL', 'Fréquence : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('semaineL', 'semaine : ') !!}
                        {!! Form::radio('frequence', 0, ['class' => 'form-control']) !!}
                        {!! Form::label('moisL', 'mois : ') !!}
                        {!! Form::radio('frequence', 1, ['class' => 'form-control']) !!}
                        {!! $errors->first('frequence', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label heure -->
                        <div class="form-group {!! $errors->has('heure') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('heureL', "Entrez le nombre d'heures :" ) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::number('heure', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('heure', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label besoin -->
                        <div class="form-group {!! $errors->has('besoin') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('besoinL', 'Besoin : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('ponctuelL', 'ponctuel : ') !!}
                        {!! Form::radio('besoin', 0, ['class' => 'form-control']) !!}
                        {!! Form::label('permanentL', 'permanent : ') !!}
                        {!! Form::radio('besoin', 1, ['class' => 'form-control']) !!}
                        {!! $errors->first('besoin', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label localisation -->
                        <div class="form-group {!! $errors->has('localisation') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('localisationL', 'Entrez le lieu de travail : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::text('localisation', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('localisation', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label deplacement -->
                        <div class="form-group {!! $errors->has('deplacement') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('deplacementL', "Distance déplacement :" ) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::number('deplacement', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('deplacement', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>
                        

                                                    <!-- label matériel -->
                            <div class="form-group {!! $errors->has('materiel') ? 'has-error' : '' !!} row">
                            <div class='col-md-4 col-form-label text-md-right'>
                            {!! Form::label('materielL', 'Description du contexte matériel: ') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::textarea('materiel', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('materiel12', '<small class="help-block">:message</small>') !!}
                            </div>
                            </div>
                

                        {{ Form::submit('Envoyer', ['class' => 'btn btn-outline-success my-2 my-sm-0 href']) }}
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
