
@extends( Auth::user()->type == 2 ? 'layouts.adminLayout' : 'layouts.userLayout')

@section('title', "Modèle de convention")

@section('content')

<br>
 <!-- The grid: four columns -->
 <div class="row justify-content-center">

  <div class="column">
    <img src="{{asset('uploads/pdf/convention-1.png')}}" alt="modele de convention-1" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/convention-2.png')}}" alt="modele de convention-2" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/convention-3.png')}}" alt="modele de convention-3" onclick="openImg(this);">
  </div>

</div>

<!-- The expanding image container -->
<div class="container">    
  <!-- Close the image -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

  <!-- Expanded image -->
  <img id="expandedImg" style="width:75%">

  <!-- Image text -->
  <div id="imgtext"></div>
</div> 

<!-- CONTENT -->

  <div class="row justify-content-center">

    <div class="col-3">
      <a class="btn btn-primary btn-block" href="{{asset('uploads/pdf/convention.pdf')}}" role="button" target="_blank">Télécharger la convention</a>
    </div>
  </div>

<br>
@endsection