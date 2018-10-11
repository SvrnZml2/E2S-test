@extends('layouts.userLayout')

@section('title', "Mon abonnement")

@section('content')

<br>
 <!-- The grid: four columns -->
 <div class="row justify-content-center">

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-1.png')}}" alt="charte engagement" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-2.png')}}" alt="charte engagement" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-3.png')}}" alt="charte engagement" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-4.png')}}" alt="charte engagement" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-5.png')}}" alt="charte engagement" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-6.png')}}" alt="charte engagement" onclick="openImg(this);">
  </div>

  <div class="column">
    <img src="{{asset('uploads/pdf/charte_laplace-7.png')}}" alt="charte engagement" onclick="openImg(this);">
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

  <div class="row">
  
    <div class="col">
      <a class="btn btn-success btn-block" href="{{asset('uploads/pdf/charte_laplace.pdf')}}" role="button" target="_blank">Télécharger la charte</a>
    </div>

    <div class="col">
      <a href="{{ route('souscription') }}" class="btn btn-warning btn-block" role="button">Je m'abonne au service</a>  
    </div>

  </div>


@endsection