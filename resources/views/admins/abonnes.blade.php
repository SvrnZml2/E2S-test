@extends('layouts.adminLayout')

@section('title', 'Liste des abonnés')

@section('content')
    <br>
    <div class="col-sm-8">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
		
				<div class="panel-heading">
					<h3 class="panel-title">Liste des abonnés</h3> 
					<div class="d-flex flex-row">
					<a href="{{ route('abonnements') }}" class="btn btn-outline-secondary" role="button">Vérification des abonnements</a>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Structures</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($utilisateurs as $utilisateur)
				
						<tr>
							<td class="text-primary"><strong>{{  $utilisateur->structure}}</strong></td>
							<td>{!! link_to_route('voir.profilStructure', 'Voir le profil', [$utilisateur->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('voir.renouvelementAbonnement', 'Renouveler son abonnement', [$utilisateur->id], ['class' => 'btn btn-warning']) !!}</td>
						</tr>
			
				@endforeach
				
	  			</tbody>
			</table>
		</div>
		{{ $utilisateurs->links() }}
	</div>
@endsection