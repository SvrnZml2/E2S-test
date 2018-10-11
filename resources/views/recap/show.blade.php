@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')
@section('title')
Proposition
@endsection
@section('content')
<div class='col-12'>
<div class='col col-md-8  readannonce'>
</h2>{{$propname}} propose à {{$destname}}</h2>
<h3>{{$proposal->proposals_titre}}</h3>
<p>{{$proposal->proposals_sub_skills}}</p>
<p>{{$proposal->proposals_description}}</p>
<p>débutant le {{date('d-m-Y', $proposal->proposals_debut)}}<p>
<p>terminant le {{date('d-m-Y', $proposal->proposals_fin)}}<p>
<p> les heures demandés sont de {{$proposal->proposals_heure}} heure(s) par {{$proposal->proposals_frequence}}<p>
<p> pour un service de type  {{$proposal->proposals_service}} un cout de {{$proposal->proposals_cout}} euros</p>
<p> se déroulant à {{$proposal->proposals_lieu}}</p>
@if(isset($admin) and $admin ==2)
<form method="POST" action="{{ route('lastValid') }}">
@csrf
{!! Form::hidden('id', $proposal->id) !!}
{{ Form::submit('Valider', ['class' => 'btn btn-success my-2 my-sm-0 href']) }}
{{ Form::close() }}
@endif
@if(isset($dest) and $dest)
<form method="POST" action="{{ route('conclure') }}">
@csrf
{!! Form::hidden('proposalId', $proposal->id) !!}
{{ Form::submit('Valider', ['class' => 'btn btn-success my-2 my-sm-0 href']) }}
{{ Form::close() }}
@endif
</div>
</div>
@endsection
