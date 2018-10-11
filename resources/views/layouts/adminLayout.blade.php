<?php 
use App\User;

$type = Auth::user()->type;

?>

@include('layouts.head')

<body>

  @include('layouts.adminheader')
  @if(isset($menu))
  @include('layouts.menu.admin.main')
  @if($menu != '')
  </br>
  @include('layouts.menu.admin.'.$menu)
  
  @endif
  @endif
  @yield('content')
  </div>
  </section>
  @include('layouts.footer')</div>
</body>
</html>
