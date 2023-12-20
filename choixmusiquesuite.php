<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$title = "Validation du titre";
include("includes/head.php");
include("includes/connexionBDD.php");

session_start();

$artiste = $_GET["artiste"];
$titre = $_GET["titre"];
$son = "1";
$sql ="SELECT * FROM `participants` WHERE `email`= :inscriptionEmail";
            $query = $db->prepare($sql);
            $query->bindvalue(":inscriptionEmail",$_SESSION["ID-Utilisateur"],PDO::PARAM_STR);
            $query->execute();
            $participant= $query->fetch();


$sql ="SELECT * FROM `musique` WHERE `titre`= :title AND `artiste` = :artiste";
                    $query = $db->prepare($sql);
                    $query->bindvalue(":title",$titre,PDO::PARAM_STR);
                    $query->bindvalue(":artiste",$artiste,PDO::PARAM_STR);
                    $query->execute();
                    $controlemusique= $query->fetch();
                    // echo("controle1");

                    $sql ="SELECT * FROM `musique` WHERE `id_user`= :iduser";
                    $query = $db->prepare($sql);
                    $query->bindvalue(":iduser",$participant["id"],PDO::PARAM_STR);
                    $query->execute();
                    $idparticipant= $query->fetch();
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
                            <h1 class="fw-bolder">Valider votre choix</h1>
                            <p class="lead fw-normal text-muted mb-0">Est ce bien la musique que vous souhaitez chanter ?</p>
                        </div>
                        <?php
                    

                        if ($controlemusique === false && $idparticipant === false){
                            if ($_POST["sure"]=== "on") {
                                
                            
                            $sql1 = 'INSERT INTO `musique`(`id_user`, `artiste`, `titre`, `bande_son`) VALUES (:iduser, :artiste, :title, :son)';
                                $query = $db->prepare($sql1);
                                $query->bindValue(":iduser", $participant["id"], PDO::PARAM_STR);
                                $query->bindValue(":artiste", $artiste, PDO::PARAM_STR);
                                $query->bindValue(":title", $titre, PDO::PARAM_STR);
                                $query->bindValue(":son", $son, PDO::PARAM_STR);
                                $query->execute();
                                header("location:insert_mp3.php");
                            
                            }
                            
                        ?>


                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            <p class="lead fw-normal text-muted mb-0">Vous avez choisi de chanter <?php echo($titre) ?> de <?php echo($artiste)?>.</p>
                                
                                <p>si c'est exact, cliquez sur valider. </p>
                                <form method="POST">
                                
                                <input type="checkbox" name="sure" > Etes vous sur de ce choix ?
                                <br>
                                <button class="btn btn-primary btn-lg "  id="submitButton" type="submit" name="submitButton" >Valider cette musique</button>
                                </form>
                                <p>sinon, lancer une nouvelle recherche <a href="Choix-musique.php">ici</a>.</p>


                            </div>


                        <?php }

                        else {
                            
                            ?>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">

                            
                                La chanson  <?php echo($titre) ?> de <?php echo($artiste)?>. <br>
                                n'est plus disponible. <br>
                                Merci de lancer une nouvelle recherche <a href="Choix-musique.php">ici</a>.

                                
                            </div>
                            <!-- par contre il faut que tu fasse un update de bande_son where id_user = $participant["id"] -->
                            <?php } ?>
                        </div>
                    </div>
            </div>
                        
            </section>
        </main>
        <!-- Footer-->
        <?php include("includes/footer.php"); ?>
    </body>
</html>
