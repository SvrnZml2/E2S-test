@extends('layouts.layout')

@section('title', 'Accueil')

@section('content')
<div class="row">
  <div id="pictEncart" class="col-sm-12 col-md-12 col-lg-12">
    <img id="visuel" src="{{asset('images/accueilvisuel.png')}}" alt="photo accueil" class="float-right"  />
    <div class="col-12">
      <div class="topleft">
        <div class="col-sm-12 col-lg-5">
          <h1 id="titleEncart" class="mt-5">Échangez des compétences et partagez des emplois, en toute simplicité.</h1>
          <p class="text-white">La Place est la solution à vos besoins de mutualisation. Offrez et demandez des
            compétences dans l'économie sociale et solidaire. <br>Recherchez des annonces dès votre première
            inscription.</p>
          <h2 class="titreH2" >Venez découvrir "La Place"</h2>

          <a href="{{ route('laplace')}}" class="btn btn-secondary" role="button">Plus d'infos...</a>
        </div>
      </div>
    </div>
  </div>
</div> <!-- ./row -->
<div id="infosEss" class="jumbotron  mx-0">
  <div class="container">
    <h2 class="titreH2">Vous êtes une structure de l'économie sociale et solidaire...</h2>
    <p class="lead">Associations, coopératives, mutuelles et entreprises solidaires de toutes les tailles et de tous
      les secteurs d'activités. <br>Vous recherchez une compétence particulière pour développer votre activité, de
      manière ponctuelle ou continue mais à temps partiel.<br> Vous souhaitez améliorer l'efficacité de votre
      structure, en allégeant la charge de travail des salarié-e-s sur les fonctions supports.</p>
    <p class="lead">Vous disposez de compétences à partager et/ou de temps salarié disponible.<br>Vous souhaitez
      consolider ou pérenniser l'emploi dans votre structure.</p>
    <a href="{{ route('structures') }}" class="btn btn-warning">Comment ça marche</a>
  </div>
</div>
<div class="jumbotron  ">
  <div class=" subscribe" >
    <h2 class="titreH2">Inscription</h2>
    <img src="{{asset('images/labographieIcons/1-inscription.png')}}" alt="Logo inscription">
    <a href="{{ route('register')}}" class="btn btn-secondary" role="button">Inscrivez-vous gratuitement</a>
  </div>
</div>


<!-- LA PLACE + SLIDER -->
<div class="jumbotron  ">
  <h2 class="titreH2">Nos dernières annonces</h2>

  <div id="sliderLaplace" class="row">



    @if(isset($annonce))
    <div id="blockSlide" class="col-sm-12">
      <div id="carouseloffres" class="col carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#carouseloffres" data-slide-to="0" class="active"></li>
          <li data-target="#carouseloffres" data-slide-to="1"></li>
          <li data-target="#carouseloffres" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner carouOffre">
          <div class="carousel-item carouOffre active">
            <img src="{{asset('images/fond.jpg')}}" alt="les annonces">
            <div class="carousel-caption">
              <div class='row no-gutters'>
                <h5 class="col-sm-12"><span style="color:#f49712;">{{$annonce[0]['titre']}}</span></h5>
                <p class="col-sm-12">{{$annonce[0]['duree']->format('%a jour(s)')}}</p>
              </div>
              <p>{{$annonce[0]['type']}}</p>
              <p>{{$annonce[0]['competence']}}</p>
              <p>{{$annonce[0]['sousCompetence']}}</p>
              <p>{{$annonce[0]['description']}}</p>
            </div> <!-- ./carousel-caption -->
          </div> <!-- carousel-item carouOffre active -->


          @if(isset($annonce[1]))
          <div class="carousel-item carouOffre">
            <img src="{{asset('images/fond.jpg')}}" alt="les annonces">
            <div class="carousel-caption">
              <div class='row no-gutters'>
                <h5 class="col-sm-12"><span style="color:#f49712;">{{$annonce[1]['titre']}}</span></h5>
                <p class="col-sm-12">{{$annonce[1]['duree']->format('%a jour(s)')}}</p>
              </div>
              <p>{{$annonce[1]['type']}}</p>
              <p>{{$annonce[1]['competence']}}</p>
              <p>{{$annonce[1]['sousCompetence']}}</p>
              <p>{{$annonce[1]['description']}}</p>
            </div>
          </div>
          @endif

          @if(isset($annonce[2]))
          <div class="carousel-item carouOffre">
            <img src="{{asset('images/fond.jpg')}}" alt="les annonces">
            <div class="carousel-caption">
              <div class='row no-gutters'>
                <h5 class="col-sm-12"><span style="color:#f49712;">{{$annonce[2]['titre']}}</span></h5>
                <p class="col-sm-12">{{$annonce[2]['duree']->format('%a jour(s)')}}</p>
              </div>
              <p>{{$annonce[2]['type']}}</p>
              <p>{{$annonce[2]['competence']}}</p>
              <p>{{$annonce[2]['sousCompetence']}}</p>
              <p>{{$annonce[2]['description']}}</p>
            </div>
          </div>
          @endif
          <a class="carousel-control-prev" href="#carouseloffres" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
          </a>
          <a class="carousel-control-next" href="#carouseloffres" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
          </a>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
<div class="jumbotron">
  <h2 class="titreH2">Découvrez les Compétences et Sous-compétences de "La Place"</h2>
  <div class="container">
    <!-- Title Competences -->
    <div class="card-columns">
      <!-- Communication externe -->
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Communication externe</h4>
          <p class="card-text">vous souhaitez communiquer sur votre projet et vous n'en avez pas le temps <br>OU<br>
            vous disposez de compétences pour élaborer une stratégie de communication, créer des flyers, affiches, etc.</p>
          <!-- button Communication externe -->
          <p><button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#1"
              aria-expanded="false" aria-controls="1">Sous-compétences</button></p>
          <div class="collapse" id="1">
            <div class="card card-block">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Stratégie de communication externe</li>
                <li class="list-group-item">Gestion du site internet</li>
                <li class="list-group-item">Réalisation de supports de communication</li>
                <li class="list-group-item">Gestion des réseaux sociaux</li>
                <li class="list-group-item">Organisation d’événements</li>
                <li class="list-group-item">Gestion des mailing</li>
                <li class="list-group-item">Relation presse</li>
              </ul>
            </div>
          </div>
          <!-- ./button Communication externe -->
        </div>
      </div>
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Communication externe</h4>
          <p class="card-text">vous souhaitez communiquer sur votre projet et vous n'en avez pas le temps <br>OU<br>
            vous
            disposez de compétences pour élaborer une stratégie de communication, créer des flyers, affiches, etc.</p>
          <!-- button Communication externe -->
          <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#1"
            aria-expanded="false" aria-controls="1">Sous-compétences</button>
          <div class="collapse" id="1">
            <div class="card card-block">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Stratégie de communication externe</li>
                <li class="list-group-item">Gestion du site internet</li>
                <li class="list-group-item">Réalisation de supports de communication</li>
                <li class="list-group-item">Gestion des réseaux sociaux</li>
                <li class="list-group-item">Organisation d’événements</li>
                <li class="list-group-item">Gestion des mailing</li>
                <li class="list-group-item">Relation presse</li>
              </ul>
            </div>
          </div>
          <!-- ./button Communication externe -->
        </div>
      </div>


      <!-- Ressource Humaine -->
      <div id="compt" class="card">
        <div class="card-block">
          <h4 class="card-title">Ressources humaines</h4>
          <p class="card-text">vous souhaitez améliorer votre gestion des ressources humaines, <br>OU<br> vous êtes
            spécialisés dans les relations entre bénévoles et salariés, dans le domaine de la santé au travail, etc.</p>
          <!-- button Ressources humaines -->
          <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#2"
            aria-expanded="false" aria-controls="2">Sous-compétences</button>
          <div class="collapse" id="2">
            <div class="card card-block">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Gestion de la convention collective</li>
                <li class="list-group-item">Paie et contrat de travail</li>
                <li class="list-group-item">La formation professionnelle des équipes en place</li>
                <li class="list-group-item">Le recrutement et procédure de licenciement de personnels</li>
                <li class="list-group-item">Le management / encadrement, suivi des salariés</li>
                <li class="list-group-item">Les relations entre bénévoles et salariés</li>
                <li class="list-group-item">Gestion de conflits</li>
                <li class="list-group-item">Le recours aux stagiaires</li>
                <li class="list-group-item">L’accompagnement à la retraite</li>
                <li class="list-group-item">Les risques psycho sociaux, la sécurité, le bien-être au travail</li>
              </ul>
            </div>
          </div>
          <!-- ./button Ressources humaines -->
        </div>
      </div>



      <!-- Stratégie et développement -->
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Stratégie et développement</h4>
          <p class="card-text">vous développez une nouvelle activité, vous avez besoin d'aide dans votre recherche de
            financement <br>OU<br> vous accompagnez les structures dans le développement de nouvelles activités.</p>
          <!-- button Stratégie et développement -->
          <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#3"
            aria-expanded="false" aria-controls="3">Sous-compétences</button>
          <div class="collapse" id="3">
            <div class="card card-block">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">La construction du budget en cohérence avec le projet de la structure</li>
                <li class="list-group-item">Méthodologie de création de nouvelles activités</li>
                <li class="list-group-item">Maîtriser les dispositifs d’aide financière</li>
                <li class="list-group-item">Répondre à des appels d’offre</li>
                <li class="list-group-item">Veille sur les appels d'offre</li>
                <li class="list-group-item">Rechercher des sources de financement, monter un dossier (en particulier
                  fonds
                  européens)</li>
                <li class="list-group-item">Etablir un budget prévisionnel, un plan de trésorerie, un plan de
                  financement
                  d’investissement</li>
              </ul>
            </div>
          </div>
          <!-- ./button Stratégie et développement -->
        </div>
      </div>

      <!-- Gestion administrative et financière -->
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Gestion administrative et financière</h4>
          <p class="card-text">vous souhaitez vous concentrer sur votre cœur d'activité <br>OU<br> vous bénéficiez de
            temps
            disponible sur de l'aide administrative.</p>
          <!-- button Gestion administrative et financière -->
          <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#4"
            aria-expanded="false" aria-controls="4">Sous-compétences</button>
          <div class="collapse" id="4">
            <div class="card card-block">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Aide administrative</li>
                <li class="list-group-item">Les assurances</li>
                <li class="list-group-item">Veille sur la réglementation</li>
              </ul>
            </div>
          </div>
          <!-- ./button Gestion administrative et financière -->
        </div>
      </div>

      <!-- Informatique -->
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Informatique</h4>
          <p class="card-text">vous souhaitez développer vos compétences numériques, <br>OU<br> vous proposez un appui
            en
            informatique.</p>
          <br>
          <br>
          <!-- button Informatique -->
          <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#5"
            aria-expanded="false" aria-controls="5">Sous-compétences</button>
          <div class="collapse" id="5">
            <div class="card card-block">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Hébergement sécurisé</li>
                <li class="list-group-item">Négociation de contrat</li>
                <li class="list-group-item">Appui informatique</li>
              </ul>
            </div>
          </div> <!-- ./button Informatique -->
        </div>
      </div>

    </div> <!-- ./card-columns -->
    <!-- ./ COMPETENCES -->

  </div>
</div>

<!-- LOGO SLIDER -->
<div class="container">
  <h2 class="sliderTitle titreH2">Nos partenaires</h2>

  <section class="customer-logos slider" id='fcontainer'>

    <div class="slide">
      <a href="https://www.pays-vannes.fr/"><img src="{{asset('images/logo_partenaires/1.png')}}" alt="pays-vannes"></a>
    </div>
    <div class="slide">
      <a href="https://europa.eu/european-union/index_fr"><img src="{{asset('images/logo_partenaires/2.png')}}" alt="europe"></a>
    </div>
    <div class="slide">
      <a href="http://www.bretagne.bzh/jcms/l_22662/fr/promouvoir-une-economie-sociale-et-solidaire"><img src="{{asset('images/logo_partenaires/3.png')}}"
          alt="bretagne"></a>
    </div>
    <div class="slide">
      <a href="http://bretagne.direccte.gouv.fr/l-Economie-sociale-et-solidaire-ESS-en-Bretagne"><img src="{{asset('images/logo_partenaires/4.png')}}"
          alt="direccte"></a>
    </div>
    <div class="slide">
      <a href="https://www.ess-bretagne.org/demarche-regionale-qualite-de-lemploi-dans-less"><img src="{{asset('images/logo_partenaires/5.png')}}"
          alt="ess"></a>
    </div>
    <div class="slide">
      <a href="http://www.golfedumorbihan-vannesagglomeration.bzh/actions-de-developpement-economique"><img src="{{asset('images/logo_partenaires/6.png')}}"
          alt="golfedumorbihan"></a>
    </div>
    <div class="slide">
      <a href="https://ess.maif.fr/ess-action"><img src="{{asset('images/logo_partenaires/7.png')}}" alt="maif"></a>
    </div>
    <div class="slide">
      <a href="http://greta-bretagne.ac-rennes.fr/portail/web/greta-de-bretagne-sud/vannes"><img src="{{asset('images/logo_partenaires/greta1.png')}}"
          alt="greta bretagne sud"></a>
    </div>
  </section>



  @endsection