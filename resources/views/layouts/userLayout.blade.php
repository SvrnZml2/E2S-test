<?php 
use App\User;
use App\Skills;

$type = Auth::user()->type;
$skills = Skills::all();
$comps= array();
foreach($skills as $skill){
$comps[$skill->id] = $skill->nom;

}
?>

@include('layouts.head')

<body>

  @include('layouts.userheader')
  @if(isset($menu))
  @include('layouts.menu.user.main')
  @if($menu != '')
 
  @include('layouts.menu.user.'.$menu)
  
  @endif
  @endif
  @yield('content')
  </div>
  </section>
  @include('layouts.footer')</div>
</body>
</html>
