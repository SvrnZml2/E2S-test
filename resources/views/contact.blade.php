@extends('layouts.layout')

@section('title', 'Contactez-nous')

@section('content')


<h1 class="contactH1">Contactez-nous</h1>



<div class="contact">

    <div class="formContact">
        {!! Form::open(['url' => 'contact']) !!}
        <h3 class="h3Form">Par message</h3>

        @csrf
        <!-- label Objet -->
        <div class="form-group {!! $errors->has('objet') ? 'has-error' : '' !!}">
            <?php
                                $data['Prenez contact avec nous'] = 'Prenez contact avec nous';
                                $data['Votre avis nous intéresse'] = 'Votre avis nous intéresse';
                                $data['Vous rencontrez un problème'] = 'Vous rencontrez un problème';
                                $data['Autres'] = 'Autres';
                                ?>
            {{ Form::select('objet', array(
            'Objet' => $data), '$data', ['class' => 'form-control', ] ) }}
            {!! $errors->first('objet', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group row {!! $errors->has('structure') ? 'has-error' : '' !!}">
            {!! Form::text('structure', null, ['class' => 'form-control', 'placeholder' =>
            'Structure']) !!}
            {!! $errors->first('structure', '<small class="help-block">:message</small>') !!}
        </div>

        <!-- label Prénom -->
        <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
            {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}

            {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
        </div>

        <!-- label Nom -->
        <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
            {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

            {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
        </div>

        <!-- label tel -->
        <div class="form-group {!! $errors->has('tel') ? 'has-error' : '' !!}">
            {!! Form::tel('telephone', null, ['class' => 'form-control', 'placeholder' => 'Téléphone']) !!}

            {!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
        </div>




        <!-- label mail -->
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])
            !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>

        <!-- Textarea -->
        <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
            {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!}
            {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('Envoyer', ['class' => 'btn btn-warning pull-right']) !!}

        {!! Form::close() !!}





    </div>
    <div class="adresse">
        <h3>Par courrier</h3>
        <img src="{{asset('images/LaPlace-Transparent.png')}}" alt="Logo La Place">
        <p class="gray">E2S Pays de Vannes - La Place<br /> 47 Rue de Ferdinand Le Dressay<br />BP 74<br />56002
            VANNES cedex</p>
    </div>
</div>
@endsection