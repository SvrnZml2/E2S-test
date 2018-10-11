@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')

@section('title')
Consultation des propositions
@endsection
@section('content')
<div class ="row">
<div class="col-12 col-sm-12">
<h2>Offres</h2>
@if($recaps != NULL)
@foreach ($recaps as $recap)


<div class='col-8 cadreBillet text-center' style='margin:auto;'>
  <h3 class='col-12'>{{ $recap['titre'] }}</h3>
  <div class='col-12 text-center'>
  <p class='text-center'>contact: {{ $recap['contact'] }}</p>
  
  <form method="POST" action="{{ route('voir_detail_propo') }}">
    @csrf
    {!! Form::hidden('id', $recap['id']) !!}
    {{ Form::submit('voir', ['class' => 'btn btn-outline-success my-2 my-sm-0 href ']) }}
    {{ Form::close() }}
    </div>
</div>

@endforeach
@endif
</div>
</div>


@endsection
