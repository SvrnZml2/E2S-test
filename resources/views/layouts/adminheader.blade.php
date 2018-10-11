<?php use App\Http\Controllers\CompaniesController; ?>
<header>
     <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{asset('images/LaPlace-Transparent.png')}}" width="200" height="100" class="d-inline-block align-top" alt="logo La Place ess">
        </a>
    
        <ul>
            <li class="nav-item dropdown right-item-nav mx-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{ CompaniesController::WhoIsMyStruct() }} <img class="avatarProfil" src="{{ Auth::user()->avatar }}" alt="logo de la structure"></a>

        <div class="dropdown-menu essbg2">
            <a class="dropdown-item essbg3" href="{{ route('admin') }}">{{ __('Tableau de bord') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('proposalUnvalidAdmin') }}">{{ __('Les annonces') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('inscrits') }}">{{ __(' Les structures') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('conventionAdmin') }}">{{ __(' Les documents') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('allMessages') }}">{{ __('Mes messages') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('profilAdministrateur') }}">{{ __('Mes données') }}</a>
            <a class="dropdown-item essbg3" href="{{ route('logout') }}"              onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Se déconnecter') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
        </div>
            </li>
        </ul>
    </nav>
</header>