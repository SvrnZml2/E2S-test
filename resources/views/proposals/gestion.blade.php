@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')

@section('title')
Consultation de ses annonces
@endsection
@section('content')
<div class ="row">
<div class="col-12 col-sm-6">
<h2>Offres</h2>
@if($offres != NULL)
@foreach ($offres as $offre)


<div class='row cadreBillet'>
  <h3 class='col-12'>{{ $offre->titre }}</h3>
  <div class='col-6'>

  <p>{{ $offre->compNom }}</p>
  <p>{{ $offre->subName }}</p>
  <p>{{ mb_strimwidth($offre->description, 0, 200, "...")}}</p>
  
  </div>
  <div class='col-6'>
  <p>paru le {{date('d-m-Y à H:i:s', $offre->updated_at)}}</p>
  <p>{{ $offre->duree->format('%a jour(s)') }}</p>
  <p>{{ $offre->lieu }}</p>
  </div>
  <a class='btn btn-outline-success my-2 my-sm-0 href ' href ='{{route('voir_offre', ['id' => $offre->proposalId])}}'> Voir les détails de l'offre</a>
</div>

@endforeach
@endif
</div>
<div class="col-12 col-sm-6">
<h2>Demandes</h2>
@if($demandes != NULL)
@foreach ($demandes as $demande)


<div class='row cadreBillet'>

  <h3 class='col-12'>{{ $demande->titre }}</h3>
  <div class='col-6'>
  
  <p>{{ $demande->compNom }}</p>
  <p>{{ $demande->subName }}</p>
  <p>{{ $demande->description }}</p>
  
  </div>
  <div class='col-6'>
  <p>{{ $demande->debut }}</p>
  <p>{{ $demande->duree->format('%a jour(s)') }}</p>
  <p>{{ $demande->lieu }}</p> 
  </div>
  <a class='btn btn-outline-success my-2 my-sm-0 href ' href ="{{route('voir_demande', ['id' => $demande->proposalId])}}"> Voir les détails de la demande</a>
</div>

@endforeach
@endif
</div>
</div>


@endsection
