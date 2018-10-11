@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')
@section('title')
Voir une demande
@endsection
@section('content')
<div class='col-12'>
<div class='col col-md-8  readannonce'>
@if (Auth::user()->type > 0)</h2>{{$demande->structNom}}</h2>@endif 
<h3>{{$demande->titre}}</h3>
<p>{{$demande->compNom}}</p>
<p>{{$demande->subName}}</p>
<p>{{$demande->description}}</p>
<p>paru le {{date('d-m-Y à H:i:s', $demande->updated_at)}}<p>
<p>du {{date('d-m-Y', $demande->debut)}}<p>
<p>au {{date('d-m-Y', $demande->fin)}}<p>
<p> les heures demandées sont de {{$demande->heure}} heure(s) par {{$demande->frequence}}<p>
<p> Les besoins pour cette mission  sont {{$demande->besoin}}<p>
@if (Auth::user()->type > 0)<p> Lieu: {{$demande->lieu}}<p>@endif 
@if ($demande->deplacement)
<p> des déplacements peuvent être prévus jusqu'à {{$demande->deplacement}} kilomètres<p>
@else
<p> Aucun déplacement prévu<p>
@endif
<p> descriptif matériel:{{$demande->materiel}}<p>

@if(Auth::user()->type == 2)
@if($demande->is_valid == 1)
<form method="POST" action="{{ route('valid') }}">
@csrf
{!! Form::hidden('proposalId', $demande->proposalId) !!}
{{ Form::submit('deValider', ['class' => 'btn btn-danger my-2 my-sm-0 href']) }}
{{ Form::close() }}
@else
<form method="POST" action="{{ route('unvalid') }}">
@csrf
{!! Form::hidden('proposalId', $demande->proposalId) !!}
{{ Form::submit('Valider', ['class' => 'btn btn-success my-2 my-sm-0 href']) }}
{{ Form::close() }}
@endif
@else
@if($proprietaire)
<form method="POST" action="{{ route('update_demande_form') }}">
@csrf
{!! Form::hidden('proposalId', $demande->proposalId) !!}
{{ Form::submit('Modifier', ['class' => 'btn btn-warning my-2 my-sm-0 href']) }}
{{ Form::close() }}
<form method="POST" action="{{ route('destroy_demande') }}">
@csrf
{!! Form::hidden('proposalId', $demande->proposalId) !!}
{{ Form::submit('Suprimer', ['class' => 'btn btn-danger my-2 my-sm-0 href']) }}
{{ Form::close() }}
@elseif(Auth::user()->type > 0)
<form method="POST" action="{{ route('negocier') }}">
@csrf
{!! Form::hidden('proposalId', $demande->proposalId) !!}
{!! Form::hidden('dest', $demande->companies_id) !!}
{{ Form::submit('Contacter', ['class' => 'btn btn-success my-2 my-sm-0 href']) }}
{{ Form::close() }}
<form method="POST" action="{{ route('proposer') }}">
@csrf
{!! Form::hidden('proposalId', $demande->proposalId) !!}
{!! Form::hidden('dest', $demande->companies_id) !!}
{!! Form::hidden('is_purpose', 2) !!}
{{ Form::submit('demande de proposition', ['class' => 'btn btn-danger my-2 my-sm-0 href']) }}
{{ Form::close() }}
@endif
@endif
</div>
</div>
@endsection
