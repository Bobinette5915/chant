<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1); 
$title = "Suivi de dossier";
include("includes/head.php");
include("includes/connexionBDD.php");

echo($_SESSION["ID-Utilisateur"]);
$sql ="SELECT * FROM `acces` WHERE `id`= :inscription";
            $query = $db->prepare($sql);
            $query->bindvalue(":inscription",$_SESSION["ID-Utilisateur"],PDO::PARAM_STR);
            $query->execute();
            $acces= $query->fetchAll();

if ($acces === null) {
    header("location:connectUser.php");
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
            <section class="vh-100" style="background-color: none;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-stepper text-black" style="border-radius: 16px;">

          <div id="verticale" class="card-body p-5">

            <?php
              if ($participant['etat'] === "1") {
                echo('<div class="d-flex justify-content-between align-items-center mb-5">
                <div><h5 class="mb-0">Dossier de <span class=" font-weight-bold">'.$participant["prenom"].'</span></h5>
                </div>
                <div class="text-end">
                  <p class="mb-0"><h5>Etat du dossier : </h5><span class="font-weight-bold">En attente de selection de la chansson</span></p>
                </div>
              </div><div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 25%"></div>
            </div>');
              }
              if ($participant['etat'] === "2") {
                echo('<div class="d-flex justify-content-between align-items-center mb-5">
                <div><h5 class="mb-0">Dossier de <span class=" font-weight-bold">'.$participant["prenom"].'</span></h5>
                </div>
                <div class="text-end">
                  <p class="mb-0"><h5>Etat du dossier : </h5><span class="font-weight-bold">En attente du reglement et / ou de Autorisation parentale</span></p>
                </div>
              </div><div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 50%"></div>
            </div>');
              }
              if ($participant['etat'] === "3") {
                echo('<div class="d-flex justify-content-between align-items-center mb-5">
                <div><h5 class="mb-0">Dossier de <span class=" font-weight-bold">'.$participant["prenom"].'</span></h5>
                </div>
                <div class="text-end">
                  <p class="mb-0"><h5>Etat du dossier : </h5><span class="font-weight-bold">En attente de validation de la bande son par le jury </span></p>
                
                </div>
              </div><div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
            </div> <br><div><p><a href="factures.php">Telecharge ta facture ici</p></div>');
              }
              if ($participant['etat'] === "4") {
                echo('<div class="d-flex justify-content-between align-items-center mb-5">
                <div><h5 class="mb-0">Dossier de <span class=" font-weight-bold">'.$participant["prenom"].'</span></h5>
                </div>
                <div class="text-end">
                  <p class="mb-0"><h5>Etat du dossier : </h5><span class="font-weight-bold">Qualifié pour le Grand Counours</span></p>
                </div>
              </div><div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
            </div> <br><div><p><a href="factures.php">Telecharge ta facture ici</p>');
              }
            ?>
            

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
<?php } ?>