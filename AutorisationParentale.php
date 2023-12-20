<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$title = "Autorisation parentale";
include("includes/head.php");
include("includes/connexionBDD.php");
session_start();

if ($_SESSION["ID-Utilisateur"]===null) {
    header("location:creercompte.php");
} else {

?>
<body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
include("includes/navbar.php");
?>
<!-- Page content-->
<section class="py-5">
                <div class="container  px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-chat-left-text"></i></div>
                            <h1 class="fw-bolder">Fiche d'Autorisation Parentale</h1>
                            <p class="lead fw-normal text-muted mb-0">A faire Completer , Signer et à Envoyer avec le reglement. <br>
                            Attention, aucun mineur ne pourra participer si cette attestation n'est  pas duement completée !</p>
                            
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                            <a href="assets/Attestation.pdf" target="blank"><strong>Telecharger l'attestation parentale ICI</strong></a>
                            <a href="Choix-musique.php" ><strong>Tout est OK? Lets go choisir ta musique</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
</section>
</main>
</body>
<?php include("includes/footer.php"); ?>
</html>












<?php
}
?>
