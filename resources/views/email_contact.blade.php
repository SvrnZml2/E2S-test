<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style_back.css') }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">
  <style>
    header {
      height: 150px;
      background: #808080;
    }

    .logoMail {
      margin-left: 5%;
      margin-top: 50px;
    }

    .h1Mail {
      text-align: center;
      margin-top: -50px;
      color: #F49712;
    }

    .pMail {
      text-align: center;
      font-size: 22px;
    }

    p {
      text-align: center;
      margin-top: 25px;
    }

    .h3mail {
      font-size: 18px;
      text-align: center;
    }
    .h3mail strong {
      text-decoration: underline;
    }
    .msgMail {
      width: 50%;
      border: 1px solid grey;
      margin-bottom: 75px;
      align-self: center;
      min-height: 150px;
    }

    hr {
      width: 15%;
    }
    .containerMail{
      width: 100%;
      text-align: center;
      display: flex;
      flex-direction: column;
    }
  </style>
</head>

<body>
  <header>
    <img class="logoMail" src="{{asset('images/LaPlace-Transparent.png')}}" alt="Logo La Place">
    <h1 class="h1Mail">Demande de contact</h1>
  </header>


  <p class="pMail">Vous avez reçu une demande de contact de la part de <strong>: {{ $prenom }} {{ $nom }}</strong></p>
  <hr>
  <div class="containerMail">
    <div class="infoMail">
    <h3 class="h3mail"><strong> Objet de la demande</strong> <br><br> "{{$objet}}"" </h3>
    <hr>
    <p><strong>Nom du contact</strong>: {{ $nom }} </p>
    <hr>
    <strong>Numéro de téléphone</strong>: {{ $telephone }} </p>
    <hr>
    <strong>Nom de la Structure</strong> : {{ $structure }} </p>
    <hr>
    <strong>Email de l'expéditeur</strong> : {{ $email }} </p>
  </div>

    <div class="msgMail">
      <p><strong>Message</strong> <br><br>{{ $texte }}</p>

    </div>
  </div>

  <footer>
    <div class="col-sm-12">
      <div class="footer-widget ">
        <h4 class="footer-title follow">Nous suivre</h4>

        <ul class="list-inline">
          <li class="list-inline-item"><a class="social-icon text-center" target="_blank" href="https://twitter.com/LaPlaceE2S"><i
                class="fab fa-twitter fa-2x"></i></a>
          </li>
          <li class="list-inline-item"><a class="social-icon text-center" target="_blank" href="https://www.facebook.com/laplace.e2s/"><i
                class="fab fa-facebook-f fa-2x"></i></a>
          </li>
          <li class="list-inline-item"><a class="social-icon text-center" target="_blank" href="https://www.linkedin.com/company/la-place-e2s/"><i
                class="fab fa-linkedin-in fa-2x"></i></a>
        </ul>
      </div>


      <!-- tiny-footer -->
    </div>
    <hr class="footer-line">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
        <div class="tiny-footer">
          <p>© 2018 | Association E2S Pays de Vannes</p>
        </div>
      </div>
  </footer>
</body>

</html>