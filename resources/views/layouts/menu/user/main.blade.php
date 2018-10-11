<nav class='row'>
@if(Auth::user()->type == 1)
<a class="nav-item btn btn-outline-primary col-2" href="{{ route('UserProposalsIndex') }}">Annonces</a>
<a class="nav-item btn btn-outline-primary col-2" href="{{ route('recap_envoi') }}">Proposition</a>
<a class="nav-item btn btn-outline-primary col-2" href="{{ route('convention') }}">Documents</a>
<a class="nav-item btn btn-outline-primary col-2" href="{{ route('allMessages') }}">Messages</a>
@endif
<a class="nav-item btn btn-outline-primary col-2" href="{{ route('lireprofil') }}">Profil</a>
</nav>