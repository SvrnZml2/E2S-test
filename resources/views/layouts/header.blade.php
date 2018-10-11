<?php use App\Http\Controllers\CompaniesController; ?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark essbg1">
        <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="{{asset('images/LaPlace-Transparent.png')}}" width="200" height="100" class="d-inline-block align-top" alt="logo La Place ess"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            @guest
            <li class="nav-item right-item-nav">
              <a class="nav-link" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
            </li>
            <li class="nav-item right-item-nav-end">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
            </li>
            @else
            
            <li class="nav-item dropdown right-item-nav">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{ CompaniesController::WhoIsMyStruct() }}</a>

            <div class="dropdown-menu essbg2">
            @if (Auth::user()->type == 2)
              <a class="dropdown-item essbg3" href="{{ route('admin') }}">{{ __('Tableau de bord') }}</a>
            @else
              <a class="dropdown-item essbg3" href="{{ route('home') }}">{{ __('Tableau de bord') }}</a>
            @endif
              <a class="dropdown-item essbg3" href="{{ route('logout') }}"              onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('se déconnecter') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
              </form>
            </div>
            </li>
            @endguest
            <li class="nav-item right-item-nav-end">
                <a class="nav-link" href="{{ route('contact') }}">Nous contacter</a>
            </li>
          </ul>
        </div>  
            
    </nav>
</header>