@extends('layouts.layout')

@section('title', "Le service La Place")

@section('content')
<br />


    <div class="container">
        <div class="row">
            <h1>La Place</h1>
            <h4>Un service innovant de mutualisation des compétences et des emplois de qualité dans les structures de l'économie sociale et solidaire sur le Pays de Vannes.</h4>
        </div>
        <br/>
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <ul class="list-group">
                        <h6>Les objectifs:</h6>
                        <li class="list-group-item">1. Créer un <b>espace collectif de mutualisation et de solidarité</b> pour le maintien et la création d’emplois de qualité.</li>
                        <li class="list-group-item">2. <b>Développer et préserver l'emploi</b> au sein d'entreprises de l'ESS, et en priorité dans celles de moins de 10 salariés.</li>
                        <li class="list-group-item">3. Accompagner la <b>professionnalisation et la formation des salariés de l’ESS</b>, notamment en lien avec la transition numérique.</li>
                        <li class="list-group-item">4. <b>Améliorer la qualité du travail</b> et le respect des travailleurs, en renforçant et valorisant leurs compétences ainsi qu’en sécurisant leurs activités (notamment par le maintien d’une activité qualitative, la dé-précarisation et la diminution de la tension due au travail en polyvalence forcée).</li>
                    </ul> 
                </div>

                <div class="col-sm-12 my-2">
                    <h6>La mission:</h6>
                    <p>La plate-forme peut répondre à des <b>besoins ponctuels ou des besoins continus à temps partiel</b> sur les compétences suivantes : ressources humaines, communication externe, stratégie et développement, gestion administrative et financière, informatique.<br />
                    Cette réponse se traduit par une mise en lien entre structures offreuses et demandeuses, sous diverses formes de mutualisation : <b>la mise à disposition</b> de salariés ou la signature d’un contrat de <b>prestation de services</b> essentiellement.<br />
                    Elle offre un cadre très simple sans création d'une nouvelle structure juridique, pour des réponses rapides et professionnelles.</p>
                </div>
            <div class="col mb-2">                
                <div class="card bg-warning text-black">
                    <div class="card-body">La Place offre un cadre très simple sans création d'une nouvelle structure juridique, pour des réponses rapides et professionnelles.
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-3">
                    <ul class="list-group">
                        <h6>Le fonctionnement:</h6>
                        <p>Le service est constituée d'une animatrice et d'une plate-forme numérique évolutive.</p>
                        <h6>Les fonctions sont :</h6>
                        <li class="list-group-item">animer et le développer le projet</li>
                        <li class="list-group-item">analyser les besoins et ressources des structures</li>
                        <li class="list-group-item">la mise en lien « offreurs/demandeurs »</li>
                        <li class="list-group-item">l'appui technique et juridique</li>
                        <li class="list-group-item">développer une offre de formation conseil spécifique</li>
                        <li class="list-group-item">accompagner la création d'emplois mutualisés</li>
                    </ul> 
                </div>
    </div> <!-- ./row -->

            <hr />
            <div class="row my-2">
                <h4>&rarr; La mutualisation pour nous, c'est quoi ?</h4>
            </div>

            <div class="row my-3">
                <div class="col-sm-6">
                    <ul class="list-group">
                        <h6>Mutualiser permet de:</h6>
                        <li class="list-group-item">Préserver des postes</li>
                        <li class="list-group-item">Partager tout ou partie des fonctions supports, alléger la charge de travail des administrateurs bénévoles, limiter l'effet de « dé-doublement » de ses salarié-e-s</li>
                        <li class="list-group-item">Répartir le temps de travail d'un.e salarié.e entre plusieurs associations dans un cadre juridique sécurisé</li>
                        <li class="list-group-item">Intégrer de nouvelles compétences et renforcer ses capacités d'action</li>
                        <li class="list-group-item">Développer de nouvelles coopérations avec d'autres structures</li>
                    </ul> 
                </div>

                <div class="col-sm-6">
                    <ul class="list-group">
                        <h6>Plusieurs formules et cadres juridiques adaptés à vos besoins et moyens:</h6>
                        <li class="list-group-item">Le prêt de salarié.e.s entre structures via la mise à disposition</li>
                        <li class="list-group-item">Le recours à une mission ponctuelle, via la prestation</li>
                        <li class="list-group-item">Le recours à un groupement d'employeurs existant ou à créer</li>
                        <li class="list-group-item" style="background-color:#f49712;">La Place vous propose un accompagnement juridique tout au long du processus de mutualisation.</li>
                    </ul> 
                </div>
           
                <div class="col-sm-12 my-4">
                    <ul class="list-group">
                        <h6>Les préalables</h6>
                        <li class="list-group-item">La confiance, la volonté de coopération et la solidarité entre les parties prenantes à un projet de mutualisation sont les clés de la réussite. En amont, il faut prendre le temps de bien évaluer les besoins de la structure et la relation aux différentes parties prenantes.</li>
                        <li class="list-group-item" style="background-color:#f49712;">La Place vous aide par un rendez-vous d' « analyse des besoins » en tout premier lieu.</li>
                    </ul> 
                </div>
 </div> <!-- ./row -->

            <div class="row justify-content-center">
                <a id="linkPlaquette" href="{{asset('uploads/pdf/osez-emploi-partage.pdf')}}" class="btn btn-success btn-lg active" role="button" aria-pressed="true" target="_blank">Osez l'emploi partagé</a>
            </div>  
    
</div> <!-- ./container --> 
<br>

        

@endsection