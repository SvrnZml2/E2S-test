@extends('layouts.layout')

@section('title', "Comment ça marche")

@section('content')
<br />
    <h1 class="text-center">Vous êtes une structure de l'ESS</h1>
<br />

    <div class="container">
        <div class="row">
            <h4 class="pb-3"><u>Comment ça marche ?</u></h4>
        </div>
            <div class="row no-gutter">
                <div class="col"><img src="{{asset('images/labographieIcons/1-Inscription.png')}}" alt="inscription"/>
                    <p>Inscrivez-vous gratuitement. Nous vous contactons pour vous proposer <b>une démonstration du service La Place</b>. Vous visualiserez les annonces partiellement.</p>
                </div>
                <div class="col"><img src="{{asset('images/labographieIcons/2-AdhesionAbonnement.png')}}" alt="inscription"/>
                    <p>Adhérez au Pôle E2S et abonnez-vous au service La Place. Vous signez une <b>charte d'engagement</b> au service. Nous réalisons avec vous un  entretien d'analyse de vos besoins.</p>
                </div>
                <div class="col"><img src="{{asset('images/labographieIcons/3-Recherchebis.png')}}" alt="inscription"/>
                    <p><b>Recherchez</b> et visualisez les annonces dans leur intégralité.<b>Publiez</b> la vôtre sur le site depuis votre « espace membre ». Bénéficiez de notre<b> appui technique.</b></p>
                </div>
                <div class="col"><img src="{{asset('images/labographieIcons/4-MiseEnLienbis.png')}}" alt="inscription"/>
                    <p>Lorsqu'une annonce vous intéresse,<b>échangez</b> via la messagerie interne avec la structure concernée. Finalisez votre accord grâce à une « fiche récapitulative de prêt ou prestation ».></p>
                </div>
                <div class="col"><img src="{{asset('images/labographieIcons/5-Juridique.png')}}" alt="inscription"/>
                    <p>Bénéficiez de notre <b>accompagnement juridique</b> pour vos démarches : <a href="{{ route('miseadisposition') }}">mise à disposition</a> de salarié, prestation, voire création de groupements d'employeurs.</p>
                </div>
                <div class="col"><img src="{{asset('images/labographieIcons/6-Contribution.png')}}" alt="inscription"/>
                    <p>Depuis la « fiche récap », nous calculons une <b>contribution à l'acte</b>, au service La Place. Nous adressons la facture à la structure qui propose une compétence.</p>
                </div>
               
            <div class="col-12">
                <a class="btn btn-success" href="{{ route('contact')}}" role="button">Contactez-nous</a>
            </div>
         </div> <!-- ./row -->   

        <div class="row">
            <h4 class="pt-3"><u>Quels sont mes avantages si j'engage ma structure auprès du service La Place ?</u></h4>
        </div>

        <div class="col">
            <ul>
                <li>&ndash; Mutualiser des compétences.</li>
                <li>&ndash; Disposer d'un appui technique et d'un accompagnement juridique dans mes démarches de <a href="{{ route('miseadisposition') }}">mises à disposition</a>, de prestations, voire de créations de groupements d'employeurs.</li>
                <li>&ndash; Participer à la consolidation, voire à la création d'emplois sur le territoire.</li>
                <li>&ndash; Intégrer / élargir et renforcer mon réseau ESS.</li>
            </ul>
        </div>
      
       </div> <!-- ./container -->





@endsection