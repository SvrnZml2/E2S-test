<?php use App\Http\Controllers\CompaniesController; ?>

<header>
    <nav class="navbar navbar-light bg-light justify-content-arround">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{asset('images/LaPlace-Transparent.png')}}" width="200" height="100" class="d-inline-block align-top" alt="logo La Place ess">
        </a>

    <div class="form-inline">
    <form method="GET" action="{{ route('proposalBySkill') }}">
         <?php
         echo Form::select('comp', $comps,NULL, array('class' => 'form-control'));
         ?>
        <button class="btn btn-success" type="submit">Rechercher</button>
    {{ Form::close() }}
</div>

<div class="col-md-2">
            <ul>
                <li class="nav-item dropdown left-item-nav">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{ CompaniesController::WhoIsMyStruct() }} <img class="avatarProfil" src="{{ Auth::user()->avatar }}" alt="photo de profil"></a>

        <div class="dropdown-menu essbg2">
            <a class="dropdown-item essbg3" href="{{ route('home') }}">{{ __('Tableau de bord') }}</a>
            @if(Auth::user()->type == 1)
            <a id="A" class="dropdown-item essbg3" href="{{ route('UserProposalsIndex') }}">{{ __('Annonces') }}</a>
            <a id="A" class="dropdown-item essbg3" href="{{ route('recap_envoi') }}">{{ __('Propositions') }}</a>
            <a id="A" class="dropdown-item essbg3" href="{{ route('convention') }}">{{ __('Documents') }}</a>
            <a id="A" class="dropdown-item essbg3" href="{{ route('allMessages') }}">{{ __('Messages') }}</a>
            @endif
            <a id="A" class="dropdown-item essbg3" href="{{ route('lireprofil') }}">{{ __('Profil') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Se déconnecter') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
        </div>
                </li>
            </ul>
</div>
    </nav>
</header>



