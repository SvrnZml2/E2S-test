<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
<!-- Les metas -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- autheur -->
<meta name="author" content="Fanny Kersuzan, Benjamin Guyot" />
<!-- copyright -->
<meta name="copyright" content="Ess pays de vannes" />
<!-- description -->
<meta name="description" content="Bienvenue dans l'accueil de la place"/>
<!-- outil -->
<meta name="generator" content="Laravel 5.6" />
<!-- mot cle -->
<Meta name="keywords" content="Facem Web, meta tag, article meta tag, definition meta tag, metakeywords, seo, référencement, optimisation">
<!-- acces bot -->
<meta name="robots" content="noindex, nofollow">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>La Place ess - @yield('title')</title>

<!-- réseau sociaux -->
 <!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@La place">
<meta name="twitter:title" content="la page d'accueil de ess">
<meta name="twitter:description" content="la page d'accueil de ess présentes l'ess">
<meta name="twitter:creator" content="@La place">
<meta name="twitter:image" content="http://www.example.com/image.jpg">

<!-- Open Graph data -->
<meta property="og:title" content="la page d'accueil de ess" />
<meta property="og:type" content="article" />
<meta property="og:url" content="laplace-ess.fr" />
<meta property="og:image" content="http://example.com/image.jpg" />
<meta property="og:description" content="la page d'accueil de ess présentes l'ess" />

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style_back.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script src="./js/carousel.js"></script>

<script src="./js/meteo.js"></script>

</head>