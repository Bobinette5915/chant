<?php

include("includes/connexionBDD.php");
$title = "Création du compte";
include("includes/head.php");

class User{
    public $name;
    public $surname;
    public $email;
    public $password;
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["password2"])) {
        // echo("controle");
        $sql="SELECT * FROM `acces` WHERE `mail`= :inscriptionEmail";
        $query = $db->prepare($sql);
        $query->bindvalue(":inscriptionEmail",$_POST["name"],PDO::PARAM_STR);
        $query->execute();
        $verifEmail= $query->fetch();

        if ($verifEmail === false){
            // echo("controle2");
            $InEmail = $_POST["name"];
            $InMdp = password_hash ($_POST["password"],PASSWORD_DEFAULT);
            $InConfirmMdp = $_POST["password2"];
            $InAdmin = "user";

            if (($_POST['password']) !== ($_POST['password2'])) {
                // echo("controlefail");
            }
            else {
                // echo("controle3");
                $SQL="INSERT INTO `acces`(`mail`, `password`, `admin`) VALUES (:inscriptionNom,:inscriptionMdp,:types)";
                $query = $db->prepare($SQL);
                $query->bindvalue(":inscriptionNom",$InEmail,PDO::PARAM_STR);
                $query->bindvalue(":inscriptionMdp",$InMdp,PDO::PARAM_STR);
                $query->bindvalue(":types",$InAdmin,PDO::PARAM_STR);
                $query->execute();
                // echo("controle4");
                session_start();
                $_SESSION['ID-Utilisateur'] = $_POST["name"];
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
                            <h1 class="fw-bolder">Création de votre Compte</h1>
                            <p class="lead fw-normal text-muted mb-0">Vous avez deja un compte? <a href="connectUser.php"> Connectez vous !</a></p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            
                                <form  method="POST">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="name" type="text" placeholder="adresse mail"  />
                                        <label for="name">Adresse mail</label>
                                        
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="password" type="password" placeholder="mot de passe"/>
                                        
                                        <label for="Password">Mot de passe</label>
                                    
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control"  name="password2" type="password" placeholder="mot de passe"  />
                                        
                                        <label for="password2">Confirmer le Mot de passe</label>
                                    
                                    </div>
                                    <?php
                                            if ((($_POST['password']) !== ($_POST['password2'])) ){
                                                echo ('<div class="alert alert-danger" role="alert">
                                                Attention, les mots de passes ne sont pas identiques.</div>');
                                            }

                                            if ($verifEmail !== false && (!empty($_POST["name"]))){
                                                echo ("<div class='alert alert-danger' role='alert'>
                                                Il semblerait qu'un compte existe deja pour cette adresse mail, <br>
                                                Essayez de vous <a href='connectUser.php'> Connectez ici ?</a></div>");
                                            }
                                            
                                            ?>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit">Créer mon compte</button></div>
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