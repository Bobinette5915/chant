<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$title = "Formulaire d'inscription";
include("includes/head.php");
include("includes/connexionBDD.php");



if (!empty($_POST["name"]) && !empty($_POST["password"])) {
    echo("controle1");


    // echo("testvideouplein");
    $sql = "SELECT * FROM `acces` WHERE `mail` = :adresseMail";
    $query = $db->prepare($sql);
    $query->bindValue(":adresseMail", $_POST["name"], PDO::PARAM_STR);
    $query->execute();
    $controleID = $query->fetch();

    $hash = $_POST["password"];
    //echo("controle2");


    $controleMdp = password_verify($hash,$controleID["password"]);
    
    //echo("controle3");


    if ($controleID !== false && $controleMdp !== false) {
        echo("le mail existe <br>");
        //echo($controleID["password"]);
        echo("Le mail et le mot de passe correspondent, bienvenu");
        
        session_start();
        $_SESSION['ID-Utilisateur'] = $controleID["id"];
        
        echo("controle1");
        if ($controleID['admin'] === "admin") {
            echo 'yes';
            $_SESSION["admin"] = 'ROLE_ADMIN';
            header("location:administrateur.php");
        }
        else {
            $_SESSION["admin"] = 'ROLE_USER';
            header("location:accueil.php");
        }
    }
    else{echo("fail");}


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
                            <h1 class="fw-bolder">Connexion à notre site</h1>
                            <p class="lead fw-normal text-muted mb-0">Vous avez n'avez pas de compte ? <a href="creercompte.php"> Créez en un vite !</a></p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            
                                <form id="contactForm" method="POST">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="name" type="text"  />
                                        <label for="name">Adresse mail</label>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="password" type="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <?php
                                                if ($controleID !== false) {

                                                    if ($controleMdp !== false) {
                                                    
                                                    }
                                                    else {
                                                        echo ('<div class="alert alert-danger" role="alert">
                                                        Mot de passe incorrect!</div>');
                                                    }

                                                }
                                                else {
                                                
                                                    echo '<div class="alert alert-danger" role="alert">
                                                    Attention, votre adresse mail ne correspond à aucun compte connu. Veuillez verifier ou creer un nouveau compte</div>';
                                                }
                                            ?>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit">Connexion</button></div>
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
