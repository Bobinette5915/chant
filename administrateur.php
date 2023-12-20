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

if ($_SESSION["admin"] !== "ROLE_ADMIN") {
    header("location:connectUser.php");
} else {


?>


<body>
<section class="py-5">
                <div class="container  px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-chat-left-text"></i></div>
                            <h1 class="fw-bolder">Recherche et Validation de dossiers</h1>
                            <p class="lead fw-normal text-muted mb-0">Validez et faites avancer l'etat des dosiers des participants</p>
                            
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                            <h4>Rappel des états d'avancée des dossiers</h4>
                                    <ol>
                                    <li>En attente de selection de la chansson <i class=" bi bi-caret-right-fill"></i> 1</li>
                                    <li>En attente du reglement et/ ou de l'autorisation parentale <i class=" bi bi-caret-right-fill"></i> 2</li>
                                    <li>En attente de validation de la bande son par le jury <i class=" bi bi-caret-right-fill"></i> 3</li>
                                    <li>Qualifié pour le Grand Concours <i class=" bi bi-caret-right-fill"></i> 4 </li>
                                    </ol>
                            </div>
                            <div class="col-lg-10 col-xl-8 mb-4">
                                <form action="" method="post">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="prenom" name="IDCandidat" type="text" placeholder="Prenom"  />
                                        <label for="IDCandidat">Rechercher le candidat par Numero</label>
                                        
                                    </div>
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit" name="submitButton" >afficher le dossier du candidat</button></div>

                                </form>
                            </div>
                                

                                <?php
                                        if (!empty($_POST[('IDCandidat')])) {
                                            $sql ="SELECT * FROM `participants` WHERE `id`= :inscriptionID";
                                            $query = $db->prepare($sql);
                                            $query->bindvalue(":inscriptionID",$_POST["IDCandidat"],PDO::PARAM_STR);
                                            $query->execute();
                                            $Candidat= $query->fetch();

                                            $sql ="SELECT * FROM `musique` WHERE `id_user`= :inscriptionID";
                                            $query = $db->prepare($sql);
                                            $query->bindvalue(":inscriptionID",$_POST["IDCandidat"],PDO::PARAM_STR);
                                            $query->execute();
                                            $chanson= $query->fetch();

                                            if ($Candidat !== false) {
                                                
                                            
                                            ?>

                            <div class="col-lg-10 col-xl-8 mt-4 mb-4">
                                <h4>Dossier correspondant au mail : </h4>
                                        <ol>
                                        <li>nom <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['nom'])?></li>
                                        <li>Prenom <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['prenom'])?></li>
                                        <li>Age <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['age'])?></li>
                                        <li>Email <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['email'])?> </li>
                                        <li>Adresse <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['adresse'])?></li>
                                        <li>Code postale et Ville <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['CodePostale'])?></li>
                                        <li>Numero de Telephone <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['phone_number'])?></li>
                                        <li>Musique choisie <i class=" bi bi-caret-right-fill"></i> <?php  echo(($chanson['artiste']).' '.($chanson['titre']))?> </li>
                                        <li>Etat actuel du dossier <i class=" bi bi-caret-right-fill"></i> <?php  echo($Candidat['etat'])?> </li>
                                        </ol>
                            </div>
                            
                            <div class="col-lg-10 col-xl-8 mt-4">
                                <h4>Voulez vous modifier l'état d'avancée du dossier ? </h4>
                                <form action="insert.php" method="get">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="prenom" name="modif" type="number" placeholder="etat" min="1" max="4" />
                                        <label for="modif">Etat d'avancée du dossier (1 , 2 , 3 ou 4)</label>
                                        <input type="hidden" name="idCompte" value="<?php echo($Candidat['id']) ?>">
                                    </div>
                                    <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit" name="submitButton" >Passer le candidat à l'etape supperieur</button></div>

                                </form>
                            </div> 


<?php
                                            }
                                            else {
                                                echo '<div class="alert alert-danger" role="alert">
                                                Attention, aucun dossier ne correspond à ce numero</div>';
                                            }  
                                        }


                                ?>
                            </div>
                        </div>
                    </div>
                </div>
</section>
</main>


<?php include("includes/footer.php"); ?>
    </body>
</html>

<?php } ?>