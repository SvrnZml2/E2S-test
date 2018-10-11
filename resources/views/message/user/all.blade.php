@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')
@section('title')
Messages reçus
@endsection
@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom structure</th>
      <th scope="col">Objet</th>
      <th scope="col">date</th>
      <th scope="col">lire</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($messages))
    @foreach($messages as $key => $message)
    <tr>
        <td>{{$message->structure}}</td>
        <td>{{$message->objet}}</td>
        <td>{{$message->created_at}}</td>
        <td>
        {!! Form::open(array('route' => 'read_message', 'method' => 'POST')) !!}
        {!! Form::hidden('companieId', $message->structkey) !!}
        {{ Form::submit('Lire', ['class' => 'btn btn-outline-success my-2 my-sm-0 href']) }}
        {{Form::close()}}
        </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{{$messages->links()}}
@endsection