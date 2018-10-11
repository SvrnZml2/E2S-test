@extends('layouts.userLayout')

@section('title', "Avenant au contrat")

@section('content')

<br>
 <!-- The grid: four columns -->
 <div class="row justify-content-center">

  <div class="column">
    <img src="{{asset('uploads/pdf/avenant-1.png')}}" alt="avant au contrat-1" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/avenant-2.png')}}" alt="avant au contrat-2" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/avenant-3.png')}}" alt="avant au contrat-3" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/avenant-4.png')}}" alt="avant au contrat-4" onclick="openImg(this);">
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
      <a class="btn btn-primary btn-block" href="{{asset('uploads/pdf/avenant.pdf')}}" role="button" target="_blank">Télécharger l' avenant</a>
    </div>
  </div>

@endsection