@extends('layouts.adminLayout')

@section('title', 'Liste des inscrits')

@section('content')
    <br>
    <div class="col-sm-offset-4 col-sm-6">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des inscrits</h3>
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
						</tr>
			
				@endforeach
				
	  			</tbody>
			</table>
		</div>
		{{ $utilisateurs->links() }}
	</div>
@endsection