@extends('layouts.adminLayout')
@section('title')
administration
@endsection
@section('content')

<h1>Bienvenue dans l'espace d'administration des catégories d'actualité</h1>
<br>
selectionné une catégorie<br>
<table class="table table-dark">
  <tbody>
@foreach ($cats as $cat)
<tr><td>{{ $cat->name }}</td><td>{{ $cat->id }}</td><td>  
{{Form::open(array('route' => array('catActu.store', $cat->id, 'files'=>true)))}}
{!! Form::submit('voir !', ['class' => 'btn btn-info pull-right']) !!}</td></tr>{!! Form::close() !!}
@endforeach
</tbody>
</table>
<br>Ou créer une nouvelle catégorie<br>
<div class="panel-body"> 

                {!! Form::open(['url' => 'catActu']) !!}

                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">

                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Votre name']) !!}

                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">

                        {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}

                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}

                {!! Form::close() !!}

            </div>
            <br>
@endsection
