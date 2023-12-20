<?php
$title = "Formulaire d'inscription";
include("includes/head.php");
include("includes/connexionBDD.php");

?>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
include("includes/navbar.php");
?>
                
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                        <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-info-circle"></i></div>
                            <h1 class="fw-bolder">Formulaire d'Inscription</h1>
                            <p class="lead fw-normal text-muted mb-0">En route vers l'aventure!</p>
                            
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            <div class="form-floating mb-3 alert alert-danger text-center">
                                <p>Vous avez deja creer in dossier d'inscription.
                                    Suivez votre dossier <a href="dossier.php">ICI</a>
                                </p></div>
                        </div>
                    </div>
                </div>
                
            </section>
        </main>
        <!-- Footer-->
        <?php include("includes/footer.php"); ?>
    </body>
</html>