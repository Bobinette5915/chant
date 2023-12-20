<?php
$title = "index";
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
            <!-- Header-->
            <header class="py-5">
                <div class="container px-5 pb-5">
                    <div class="row gx-5 align-items-center bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="col-xxl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xxl-start">
                                <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Talents &middot; Chants &middot; Concours</div></div>
                                <div class="fs-3 fw-light text-muted">Et si c'etait vous le talent de demain?</div>
                                <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Inscrivez vous vite</span></h1>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="inscription.php">inscription</a>
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="dossier.php">Suivi de dossier</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-7">
                            <!-- Header profile picture-->
                            <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                                <div class="profile bg-gradient-primary-to-secondary">
                                    <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                    <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                    <img class="profile-img" src="assets/micro_headphones.svg" alt="logo" />
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About Section-->
            <section class=" py-5">
                <div class="container px-5">
                    <div class="row bg-light gx-5 rounded-4 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">LE concours de chant de VOTRE Ville</span></h2>
                                <p class="lead fw-light mb-4">Venez participer au plus grand concours de chant de l'Audomarois</p>
                                <p class="text-muted">Participation des 16 ans*, Ouverts à tous et tout style de chants, Une chanson par personne <br>
                            Defiez le Jury en affirmant Votre style, Prouvez votre talent, Emerveillez le public.</p>
                                <div class="d-flex justify-content-center fs-2 gap-4">
                                    <a class="text-gradient" href="https://www.facebook.com/villedelonguenesse"><i class="bi bi-facebook"></i></a>
                                    <a class="text-gradient" href="https://ville-longuenesse.fr/fr/"><i class="bi bi-google"></i></a>
                                    <a class="text-gradient" href="https://www.google.com/maps/dir//Longuenesse/@50.7348216,2.206916,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47dc55ff118e41a1:0x66c3cfd3a5b79e7f!2m2!1d2.243632!2d50.736744!3e0?entry=ttu"><i class="bi bi-geo-alt"></i></a>
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
