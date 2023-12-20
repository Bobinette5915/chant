<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$title = "Formulaire d'inscription";
include("includes/head.php");
include("includes/connexionBDD.php");
session_start();

if ($_SESSION["ID-Utilisateur"]===null) {
    header("location:creercompte.php");
} else {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['phone']) && !empty($_POST['code']) && $_POST['reglement']==="on") {
        // echo("controle");

        if ($_POST['age']>='16') {
        
        
        $sql ="SELECT * FROM `participants` WHERE `email`= :inscriptionEmail";
            $query = $db->prepare($sql);
            $query->bindvalue(":inscriptionEmail",$_POST["email"],PDO::PARAM_STR);
            $query->execute();
            $verifEmail= $query->fetch();
            // echo("controle1");
            
            if ($verifEmail === false){
                // echo("controle2");
                $InNom = $_POST["nom"];
                $InPrenom = $_POST["prenom"];
                $InAge = $_POST["age"];
                $InEmail = $_SESSION['ID-Utilisateur'];
                $InTel = $_POST["phone"];
                $InAdresse = $_POST["adresse"];
                $InCode = $_POST["code"];
                $InReglement = $_POST["reglement"];
                $InEtat = "1";
                // echo("controle3");
                $SQL= "INSERT INTO `participants`( `nom`, `prenom`, `age`, `email`, `adresse`,`CodePostale`, `phone_number`, `reglement`, `etat`) VALUES (:inscriptionNom,:inscriptionPrenom,:inscriptionAge,:inscriptionEmail,:inscriptionAdresse,:inscriptionCode,:inscriptionTel,:reglement,:etat)";
                        $query = $db->prepare($SQL);
                        echo("controle4");
                        $query->bindvalue(":inscriptionNom",$InNom,PDO::PARAM_STR);
                        $query->bindvalue(":inscriptionPrenom",$InPrenom,PDO::PARAM_STR);
                        $query->bindvalue(":inscriptionAge",$InAge,PDO::PARAM_STR);
                        $query->bindvalue(":inscriptionEmail",$InEmail,PDO::PARAM_STR);
                        $query->bindvalue(":inscriptionAdresse",$InAdresse,PDO::PARAM_STR);
                        $query->bindvalue(":inscriptionCode",$InCode,PDO::PARAM_STR);
                        $query->bindvalue(":inscriptionTel",$InTel,PDO::PARAM_STR);
                        $query->bindvalue(":reglement",$InReglement,PDO::PARAM_STR);
                        $query->bindvalue(":etat",$InEtat,PDO::PARAM_STR);
                        $query->execute();
                        
                        $_SESSION["ID"] = $verifEmail["id"];
                        // echo("controle5");
                        if ($_POST["age"] >= '18') {
                            header("location:Choix-musique.php");
                        }
                        else {
                            header("location:Autorisationparentale.php");
                        }

            }
        }
    
    }



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
                            
                                <form id="contactForm" method="POST">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nom" name="nom" type="text" placeholder="Nom"  />
                                        <label for="nom">Nom</label>
                                        
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="prenom" name="prenom" type="text" placeholder="Prenom"  />
                                        <label for="prenom">Prenom</label>
                                        
                                    </div>
                                    <!-- age input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="age" name="age" type="number" placeholder="21 ans" />
                                        <label for="age">Age</label>
                                        
                                    </div>
                                    <?php
                                                    if ($_POST["age"] < "16" && !empty($_POST["age"])) {
                                                        echo ('<div class="alert alert-danger" role="alert">
                                                        Désolé, le concours est reservé aux + 16 ans </div>');
                                                    }
                                            ?>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="email" value="<?php echo($_SESSION['ID-Utilisateur'])?>" />
                                        <label for="email">Adresse email</label>
                                    </div>

                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone_number" name="phone"type="number" placeholder="0612345689" />
                                        <label for="phone">Numero de Telephone</label>
                                        
                                    </div>
                                    <!-- Adresse input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="adresse" type="text" placeholder="567 route de saint omer" />
                                        <label for="adresse">Adresse</label>
                                        
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="code" type="text" placeholder="62500" />
                                        <label for="adresse">Code Postale</label>
                                        
                                    </div>
                                    <div class="form-floating mb-3 ">
                                        <input  id="checkbox" name="reglement" type="checkbox" placeholder="567 route de saint omer" />  <a class="text-dark" href="Reglement.php"> Reglement</a> Lu et Approuvé
                                        
                                    </div>
                                    <?php
                                                    if ($_POST["reglement"] !== "on") {
                                                        echo ('<div class="alert alert-danger" role="alert">
                                                        Vous devez valider le reglement !!! </div>');
                                                    }
                                            ?>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit" name="submitButton" >Continuer l'inscription</button></div>
                                </form>
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


<?php
}
?>