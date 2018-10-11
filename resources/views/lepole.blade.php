@extends('layouts.layout')

@section('title', "Le Pôle E2S")

@section('content')
<br />


    <div class="container">
        <!-- <section> -->
        <div class="row">
            <img id="logoess" src="{{asset('images/e2s.png')}}" alt="logo de l'E2S" height="70" width="70">
            <h1 class="title-heading ml-3 pt-3">Le Pôle E2s</h1>
                
            <h4 class="my-2">L'association E2S Pays de Vannes est un pôle de développement de l'économie sociale et solidaire.<br>Il en existe aujourd'hui 21 sur l'ensemble des Pays bretons.</h4>
        </div> <!-- ./row -->

            <div class="col-md-12 mt-4">
                <h5>Créé en 2010 à l’initiative des acteurs du territoire, l'association E2S du Pays de Vannes est:</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">un réseau territorial et dynamique des acteurs de l’ESS pour participer au développement économique durable du territoire</li>
                    <li class="list-group-item">un lieu ressource local sur les questions d’Économie Sociale et Solidaire</li>
                    <li class="list-group-item">un réseau pour favoriser la coopération, la mutualisation et les innovations</li>
                </ul> 
            </div>
            
            <div class="col-md-12 mt-4">
                    <h5>Comme les autres pôles ESS en Bretagne, il assure les missions suivantes:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Développer l'emploi et l'entrepreneuriat ESS,</li>
                            <li class="list-group-item">Conduire des projets collectifs,</li>
                            <li class="list-group-item">Développer une culture ESS.</li>
                        </ul> 
            </div>
            
            <blockquote class="blockquote text-center my-5">
                <footer class="blockquote px-4 py-4"><span style="font-weight: bold; color:orange">Avec 9 205 emplois</span> et 11% de croissance de l’emploi entre 2011 et 2016 sur le Pays de Vannes, l’Économie Sociale et Solidaire (ESS) représente une force pour le territoire.</footer>
                <cite title="Source">* Chiffres ORESS-Observatoire Régionale de l’Economie Sociale et Solidaire de Bretagne d’après chiffres ACOSS-URSAF , effectifs moyens annuels (hors régime agricole), ESS, privée (hors ESS) EPCI </cite>
            </blockquote>

            <div class="col">
                <h4>&rarr; L'ESS, c'est quoi ?</h4>
            </div>

            <div class="col">
                <p>La loi du 31 juillet 2014 définit l’Économie Sociale et Solidaire (ESS) comme : <i>« Un mode d’entreprendre et de développement économique adapté à tous <strong>les domaines</strong> de l’activité humaine auquel adhérent des personnes morales de droit privée qui remplissent les 3 conditions cumulatives suivantes:</i></p>
                <ul>
                    <li class="my-3 ml-4">
                        <span class="fa-stack">
                        <span class="fa fa-circle-o fa-stack-3x"></span>
                        <strong class="fa-stack-2x">1</strong>
                        </span>
                        <strong>Un but</strong> poursuivi <strong>autre</strong> que le seul <strong>partage des bénéfices</strong>
                    </li>
                    <li class="my-3 ml-5">
                        <span class="fa-stack">
                        <span class="fa fa-circle-o fa-stack-3x"></span>
                        <strong class="fa-stack-2x">2</strong>
                        </span>
                        <strong>Une gouvernance démocratique</strong>  définie et organisée par les statuts, prévoyant l’information et la participation des associés, des salariés et des parties prenantes aux réalisations de l’entreprise
                    </li>
                    <li class="my-3 ml-5 pl-4">
                        <span class="fa-stack">
                        <span class="fa fa-circle-o fa-stack-3x"></span>
                        <strong class="fa-stack-2x">3</strong>
                        </span>
                        Une gestion conforme aux principes suivants:
                            <p class="pl-5">&ndash; les bénéfices sont majoritairement consacrés au maintien ou au développement de l’activité de l’entreprise</p>
                            <p class="pl-5">&ndash; des réserves obligatoires impartageables, qui ne peuvent être distribuées.</p>
                    </li>
                </ul> 
            </div>

               <div class="col">
                <p>Ce sont:</p>
                    <ul class="list-group">
                            <li>&ndash; des sociétés de personnes et non de capitaux</li>
                            <li>&ndash; des statuts historiques de l’ESS: <strong>coopératives, associations, mutuelles et fondations</strong></li>
                            <li>&ndash; des <strong>entreprises immatriculées «ESS»</strong> au registre du commerce et des sociétés ou agréées <strong>Entreprises Solidaires d’Utilité Sociale (ESUS)</strong></li>
                        </ul> 
                </div>
            <div class="col my-3">         
                <p>L’ESS vise à créer de la valeur pour le territoire à travers <strong>des activités non délocalisables</strong>. La participation des citoyens, des acteurs locaux au développement du territoire, crée une <strong>dynamique d’engagement et d’innovation locale</strong>, propre à servir l’attractivité du territoire. L’ESS <strong>privilégie le maintien de l’emploi et le développement d’activités sur le territoire</strong> à la distribution de bénéfices.</p>
            </div>
                <hr>
                <div class="card">
                    <h5 class="card-header">Contact</h5>
                <div class="card-body">
                    <h5 class="card-title">Mélanie CADIO</h5>
                    <p class="card-text">47 rue Ferdinand Le Dressay BP 74 56002 VANNES Cedex</p>02 97 47 48 09 / 06 28 54 84 08 &ndash;
                    <u style="color:blue;">e2s.vannes@gmail.com</u>
                    <br>
                    <a href="http://www.e2s-paysdevannes.fr/" class="card-text">www.e2s-paysdevannes.fr</a>
                </div>
                </div>
        
        </div> <!-- ./row -->     
    </div> <!-- ./container -->  

<br>
@endsection