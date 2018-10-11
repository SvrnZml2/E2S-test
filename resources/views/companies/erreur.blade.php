@extends('layouts.userLayout')
@section('title')
erreur
@endsection
@section('content')
<div class='col-12 erreur'>
<h2>Erreur</h2>
</div>
<div class='col-12 erreur'>
<p>{{$erreur}}</p>
</div>

@endsection
