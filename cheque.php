<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$title = "Envoi Cheque";
include("includes/head.php");
include("includes/connexionBDD.php");
session_start();

if ($_SESSION["ID-Utilisateur"]===null) {
    header("location:creercompte.php");
} else {

    $sql ="SELECT * FROM `participants` WHERE `email`= :inscriptionEmail";
    $query = $db->prepare($sql);
    $query->bindvalue(":inscriptionEmail",$_SESSION["ID-Utilisateur"],PDO::PARAM_STR);
    $query->execute();
    $participant= $query->fetch();

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
                            <h1 class="fw-bolder">Finalisation du dossier</h1>
                            <p class="lead fw-normal text-muted mb-0">Votre dossier est presque complet !</p>
                            
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                            <div class="form-floating mb-3 alert alert-success text-center">
                                <p> Pour finaliser votre dossier : <br><br>
                            Merci de déposer à la mairie de LONGUENESSE ou de poster à l'adresse suivante : <br> 13 Rue Joliot Curie, 62219 LONGUENESSE <br> <br>
                            -le cheque de 10 euros  au nom du "Comité des fêtes de LONGUENESSE <br>
                            -L'Autorisation Parentale précédement imprimée et complétée.</p> <br><br>
                        ATTENTION, Bien renseigner votre Numero de participant au dos du cheque!!! Votre numero est le : <strong class="text-decoration-underline fs-3"> <?php echo($participant["id"])?></strong></div>
                            </div>
                        </div>
                        <br>
                        <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-8 d-flex justify-content-between">
                        <a class="btn btn-primary  " href="dossier.php"><strong>Consulter l'avancement de mon Dossier</strong></a>
                        
                        <a class="btn btn-primary  " href="accueil.php"><strong>Retour à l"accueil</strong></a>
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
