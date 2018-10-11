@extends('layouts.layout')

@section('title', 'Inscription')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __("S'inscrire") }}</div>

                <div class="card-body">

                    <div id="erreur">
                        
                    </div>

                    <form id="formE"method="POST" action="{{ route('register') }}" onSubmit="return verif_formulaire()">
                        @csrf

                        <div class="form-group row">
                            <label for="name"  class="col-md-6 col-form-label text-md-right">{{ __("Structure de l'économie sociale et solidaire") }}</label>

                            <!-- STRUCTURE -->
                            <div class="col-md-6">
                                <input id="structure" type="text" class="form-control{{ $errors->has('structure') ? ' is-invalid' : '' }}" name="structure" value="{{ old('structure') }}" required autofocus>

                                @if ($errors->has('structure'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('structure') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- STATUT -->
                        <div class="form-group row">
                            <label for="name" class="col-md-6 col-form-label text-md-right">{{ __("Statut de votre structure") }}</label>

                            <div class="col-md-6">
                                <input id="statut" type="text" class="form-control{{ $errors->has('statut') ? ' is-invalid' : '' }}" name="statut" value="{{ old('statut') }}" required autofocus>

                                @if ($errors->has('statut'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('statut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- NOM -->
                        <div class="form-group row">
                            <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- PASSWORD-->
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <p id="aideMdp"></p>
                            </div>
                        </div>

                        <!-- confirmation PASSWORD -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ __('Confirmez votre mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- button CREATION utilisateur -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <input type="button" id="check" value="s'enregistrer" class="btn btn-primary"/>  
                                <button id="submit" type="submit" class="btn btn-primary">
                                    {{ __("S'enregistrer") }}
                                </button>
                                <input type="reset" id="rafraichir" value="Rafraîchir" class="btn btn-secondary"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/loginControl.js"></script>
@endsection



