@extends('layouts.userLayout')
@section('title')
metre a jour l'annonce
@endsection
@section('content')
<?php $element = 'offre'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @if(isset($recap) and $recap)
            <div class="card-header"><h1>{{ __("créer une proposition") }}</h1></div>
            @else
                <div class="card-header"><h1>{{ __("Mettre a jour une Offre") }}</h1></div>
            @endif
                <div class="card-body">
                @if(isset($recap) and $recap)
                <form method="POST" action="{{ route('create_recap_offre') }}">
                @else
                <form method="POST" action="{{ route('update_offre') }}">            
                @endif
                    
                        @csrf
                        {!! Form::hidden('proposalId', $id) !!}
                        {!! Form::hidden('companieId', $proposition->companies_id) !!}
                        <div class="row justify-content-left"><h4>Renseignements sur la proposition<h4></div>
                        <!-- label type -->
                        <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('typeL', 'type :') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('type2L', $proposition->type) !!}
                        {!! Form::hidden('type', $proposition->type) !!}
                        </div>
                        </div>

                        <!-- label Titre -->
                        <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('titreL', 'Entrez un titre : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::text('titre', $proposition->titre, ['class' => 'form-control']) !!}

                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label cat -->
                        <div class="form-group {!! $errors->has('catL') ? 'has-error' : '' !!} row">
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
                        {!! Form::label('competenceL', 'choisissez une compétence') !!}
                        </div>
                        <div class="col-md-6">
                         {!! Form::select('comp', $liste) !!}
                        {!! $errors->first('comp', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                         <!-- label description -->
                         <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('descriptionL', "Description de l'annonce: ") !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::textarea('description', $proposition->description, ['class' => 'form-control']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label debut -->
                        <div class="form-group {!! $errors->has('debut') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('debutL', 'Sélectionnez la date de début de mission: ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::date('debut', $proposition->debut, ['class' => 'form-control']) !!}

                        {!! $errors->first('debut', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label fin -->
                        <div class="form-group {!! $errors->has('fin') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('finL', 'Sélectionnez la date de fin de mission: ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::date('fin',  $proposition->fin, ['class' => 'form-control']) !!}

                        {!! $errors->first('fin', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label archivage -->
                        <div class="form-group {!! $errors->has('archivage') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('archivageL', "Sélectionnez la date d'expiration de l'annonce:" ) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::date('archivage', $proposition->expiration, ['class' => 'form-control']) !!}

                        {!! $errors->first('archivage', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label fréquence -->
                        <div class="form-group {!! $errors->has('frequence') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('frequenceL', 'fréquence : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('semaineL', 'semaine : ') !!}
                        {!! Form::radio('frequence', 0, $frequence['semaine']) !!}
                        {!! Form::label('moisL', 'mois : ') !!}
                        {!! Form::radio('frequence', 1, $frequence['mois']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label heure -->
                        <div class="form-group {!! $errors->has('heure') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('heureL', "Entrez le nombre d'heures :" ) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::number('heure', $proposition->heure, ['class' => 'form-control','step'=>'any']) !!}

                        {!! $errors->first('heure', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label besoin -->
                        <div class="form-group {!! $errors->has('besoin') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('besoinL', 'besoin : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::label('ponctuelL', 'ponctuel : ') !!}
                        {!! Form::radio('besoin', 0, $besoin['ponctuel']) !!}
                        {!! Form::label('permanentL', 'permanent : ') !!}
                        {!! Form::radio('besoin', 1, $besoin['permanent']) !!}
                        {!! $errors->first('besoin', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label localisation -->
                        <div class="form-group {!! $errors->has('localisation') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('localisationL', 'Entrez le lieu de travail : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::text('localisation', $proposition->lieu, ['class' => 'form-control']) !!}

                        {!! $errors->first('localisation', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label deplacement -->
                        <div class="form-group {!! $errors->has('deplacement') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('deplacementL', "distance déplacement :" ) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::number('deplacement', $proposition->deplacement, ['class' => 'form-control']) !!}

                        {!! $errors->first('deplacement', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>
                        
                                                    <!-- label service -->
                            <div class="form-group {!! $errors->has('service') ? 'has-error' : '' !!} row">
                            <div class='col-md-4 col-form-label text-md-right'>
                            {!! Form::label('serviceL', 'service : ') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::label('prestationL', 'prestation : ') !!}
                            {!! Form::radio('service', 0, $service['prestation']) !!}
                            {!! Form::label('dispositionL', 'mise à disposition : ') !!}
                            {!! Form::radio('service', 1, $service['disposition']) !!}
                            {!! $errors->first('service', '<small class="help-block">:message</small>') !!}
                            </div>
                            </div>


                                                    <!-- label prix -->
                            <div class="form-group {!! $errors->has('cout') ? 'has-error' : '' !!} row">
                            <div class='col-md-4 col-form-label text-md-right'>
                            {!! Form::label('coutL', 'Entrez le prix de la prestation (ou le coût horaire de la mise à disposition):') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::number('cout', $proposition->cout, ['class' => 'form-control','step'=>'any']) !!}

                            {!! $errors->first('cout', '<small class="help-block">:message</small>') !!}
                            </div>
                            </div>
                        
                            @if(isset($recap) and $recap)
                            @if(isset($dest))
                            {!! Form::hidden('dest', $dest) !!}
                            @endif
                            {{ Form::submit('envoie fiche recap', ['class' => 'btn btn-warning my-2 my-sm-0 href']) }}
                            {{ Form::close() }}
                             @else
                            {{ Form::submit('metre a jour', ['class' => 'btn btn-warning my-2 my-sm-0 href']) }}
                            {{ Form::close() }}
                            @endif
                            

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
