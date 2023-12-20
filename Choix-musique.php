<?php

$title = "Choix du Titre";
include("includes/head.php");
include("includes/connexionBDD.php");

session_start();




?>

    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
include("includes/navbar.php");
?>
            <!-- Page content-->
            <body class="d-flex flex-column">
        
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Choisissez votre musique</h1>
                            <p class="lead fw-normal text-muted mb-0">Esperons quelle soit encore dispo!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                
                                
            <input type="text" class="recherche form-control" placeholder="Entrer le titre recherché">
            <button id="bouton" class="btn btn-primary btn-lg "> valider</button>
        </div>
        <div class="liste">
            
            <p id="test"></p>
        </div> 
        <div>
                                <script>
                                    let titres = []
                                    let artiste = []
                                    let Titreshtml = document.querySelector("#titres")
                                    let Artisteshtml = document.querySelector("#artistes")
                                    let Test = document.querySelector("#test")
                                    let bouton = document.querySelector("#bouton")
                                    let valueImput = document.querySelector(".recherche");
                                    let TitreRecherche ;
                                    let url;

                                    const options = {
                                                method: 'GET',
                                                headers: {
                                                    'X-RapidAPI-Key': '1d48ea6b80msh99a57e228027dcfp112337jsn7d79628ffdd7',
                                                    'X-RapidAPI-Host': 'shazam.p.rapidapi.com'
                                                    }
                                            };


                                    bouton.addEventListener("click", function() {
                                        TitreRecherche =  valueImput.value;
                                        TitreRecherche = TitreRecherche.replaceAll(' ','%20');
                                        console.log(TitreRecherche);
                                        url = 'https://shazam.p.rapidapi.com/search?term=' + TitreRecherche +'&locale=en-US&limit=5';
                                        getData()
                                        })

                                        async function getData(){
                                                
                                            const response = await fetch(url, options);
                                            const result = await response.json();
                                        
                                            for (let index = 0; index < 3; index++) {
                                                titres.push(result.tracks.hits[index].track.title)
                                                artiste.push(result.tracks.hits[index].track.subtitle)
                                                console.log(titres[index]);
                                                console.log(artiste[index]);
                                                Test.innerHTML += '<a style="color:black" href="choixmusiquesuite.php?titre=' + titres[index] + '&amp;artiste='+ artiste[index] + '"> Vous avez choisi de chanter : ' + titres[index] + ' de ' + artiste[index] + ' <br> Est-ce exacte ? <br>'
                                            }
                                        }
                                        
                                </script>
                            </div>
                        </div>
                    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php include("includes/footer.php"); ?>
    </body>
</html>
