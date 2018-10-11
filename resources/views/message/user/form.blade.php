@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')
@section('title')
Nouveau message
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ __("Nouveau message") }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_new_message') }}" id='newMessage'>
                        @csrf
                        <div class="row justify-content-left"><h4>Renseignements sur la proposition<h4></div><hr>
                        <!-- label destinataire -->
                        <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('destinataireL', 'Destinataire :') !!}
                        </div>
                        <div class="col-md-6">
                        
                        <input type="text" list="destinataire" autocomplete="off" id="choixDestinataire" name="choixDestinataire" class='form-control'>
                        <datalist id="destinataire">
                        @foreach($datas as $key => $data)
                        <option data-value="{{$data['id']}}" value="{{$data['structure']}}" ></option>
                        @endforeach
                        </datalist>

                        {!! $errors->first('choixDestinataire', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label Titre -->
                        <div class="form-group {!! $errors->has('objet') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('objetL', 'Objet : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::text('objet', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('objet', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>

                        <!-- label cat -->
                        <div class="form-group {!! $errors->has('catL') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('messageL', 'Message :') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('message', '<small class="help-block">:message</small>') !!}
                        </div>
                        </div>
                            {{ Form::submit('Envoyer', ['class' => 'btn btn-success my-2 my-sm-0 href']) }}
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
