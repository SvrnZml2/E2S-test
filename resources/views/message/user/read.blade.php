@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')
@section('title')
Lire messages
@endsection
@section('content')

<div class='col-12'>
<div class='col col-md-8  readannonce'>
    <h1>Suivi de la conversation</h1>
        <p>
        {!! Form::open(array('route' => 'answer_form_message', 'method' => 'POST')) !!}
        {!! Form::hidden('dest', $dest) !!}
        {{ Form::submit('Répondre', ['class' => 'btn btn-outline-success my-2 my-sm-0 href']) }}
        {{ Form::close() }}
        </p>
    @if(isset($messages))
    @foreach($messages as $message)
        <i>{{$message->structure}} le {{$message->created_at}}</i>
        <p>objet : {{$message->objet}}</p>
        <p>{{$message->message}}</p>
        @if($message->is_purpose == 1 and $message->id_dest == Auth::user()->id)
        {!! Form::open(array('route' => 'FormFicheWithOffre', 'method' => 'POST')) !!}
        {!! Form::hidden('dest', $dest) !!}
        {!! Form::hidden('proposal', $message->id_proposal) !!}
        {!! Form::hidden('recap', true) !!}
        {{ Form::submit("Générer une fiche récap", ['class' => 'btn btn-outline-danger my-2 my-sm-0 href']) }}
        {{ Form::close() }}
        @endif
        @if($message->is_purpose == 2 and $message->id_dest == Auth::user()->id)
        {!! Form::open(array('route' => 'messagerieAuthorisation', 'method' => 'POST')) !!}
        {!! Form::hidden('dest', $dest) !!}
        {!! Form::hidden('is_purpose', 3) !!}
        {!! Form::hidden('proposal', $message->id_proposal) !!}
        {{ Form::submit("Autoriser la demande d'offre", ['class' => 'btn btn-outline-danger my-2 my-sm-0 href']) }}
        {{ Form::close() }}
        @endif
        @if($message->is_purpose == 3 and $message->id_dest == Auth::user()->id)
        {!! Form::open(array('route' => 'FormFicheWithDemande', 'method' => 'POST')) !!}
        {!! Form::hidden('dest', $dest) !!}
        {!! Form::hidden('recap', true) !!}
        {!! Form::hidden('proposal', $message->id_proposal) !!}
        {{ Form::submit("Générer une fiche récap", ['class' => 'btn btn-outline-danger my-2 my-sm-0 href']) }}
        {{ Form::close() }}
        @endif
        <hr>
    @endforeach
    @endif
    </div>
</div>

@endsection