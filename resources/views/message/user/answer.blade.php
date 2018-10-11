@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')
@section('title')
Nouveau message
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ __("Réponse") }}</h1></div>

                <div class="card-body">
                      {{Form::open(array('route' => 'answer_message'))}}
                    
                        @csrf
                        @if(isset($proposalId))
                        {!! Form::hidden('proposalId', $proposalId) !!}
                        @endif
                        @if(isset($is_purpose))
                        {!! Form::hidden('is_purpose', 1) !!}
                        @endif

                        <div class="row justify-content-left"><h4>Renseignements sur la proposition<h4></div>
                        <!-- label destinataire -->
                        <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('destinataireL', 'destinataire :') !!}
                        </div>
                        <div class="col-md-6">
                        
                        <input type="text" value="{{$dest}}" readonly="readonly"  id="choixDestinataire" name="choixDestinataire" class='form-control'>
                    
                        </div>
                        </div>

                        <!-- label Titre -->
                        <div class="form-group {!! $errors->has('objet') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('objetL', 'Objet : ') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::text('objet', null, ['class' => 'form-control']) !!}

                      
                        </div>
                        </div>

                        <!-- label cat -->
                        <div class="form-group {!! $errors->has('catL') ? 'has-error' : '' !!} row">
                        <div class='col-md-4 col-form-label text-md-right'>
                        {!! Form::label('messageL', 'message :') !!}
                        </div>
                        <div class="col-md-6">
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            
                        </div>
                        </div>
                            {{ Form::submit('Envoyer', ['class' => 'btn btn-outline-success my-2 my-sm-0 href']) }}
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
