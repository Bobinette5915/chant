<?php
$title = "Facture";
include("includes/head.php");
include("includes/connexionBDD.php");
session_start();


$sql ="SELECT * FROM `acces` WHERE `id`= :inscriptionEmail";
            $query = $db->prepare($sql);
            $query->bindvalue(":inscriptionEmail",$_SESSION["ID-Utilisateur"],PDO::PARAM_STR);
            $query->execute();
            $acces= $query->fetch();

if ($acces===null) {
  header("location:connectUser.php");
} else {

  $sql = "SELECT * FROM `participants` WHERE `email`= :inscriptionEmail";
  $query = $db->prepare($sql);
  $query->bindvalue(":inscriptionEmail", $acces["mail"], PDO::PARAM_STR);
  $query->execute();
  $participant = $query->fetch();
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
              <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                  class="bi bi-envelope"></i>
              </div>
              <h1 class="fw-bolder">Inscription valide et confirmée</h1>
              <p class="lead fw-normal text-muted mb-0">Le Reglement a bien été pris en Compte</p>
              
            </div>
            
              
            <div class="row gx-3 justify-content-center">
              
              <div class="col-md-10 col-xl-10">

                <div id="imprim" class="form-floating">
                  
                  <div class="card">
                    
                    <div class="card-body mx-4">
                    <div class="d-flex justify-content-end"><a href="genpdf.php" target="_blank"><button class="btn btn-primary btn-lg "><i class="bi bi-printer-fill"></i></button></a></div>
                      <div class="container">
                        <p class="my-3" style="font-size: 30px;">Merci de votre inscription</p>
                        <div class="row">
                          <ul class="list-unstyled">
                            <li class="text-black">
                              <?php echo ($participant["prenom"] . ' ' . $participant["nom"]) ?>
                            </li>
                            <li class="text-muted mt-1"><span class="text-black">Candidat numero
                                <?php echo ($participant["id"]) ?>
                              </span></li>
                            <li class="text-black mt-1">
                              <?php echo ($participant["phone_number"]) ?>
                            </li>
                            <li class="text-black mt-1">
                              <?php echo ("le " . date(" d/m/Y ")) ?>
                            </li>
                          </ul>
                          <hr style="border: 2px solid black;">
                          <div class="col-xl-10">
                            <p>Frais d'inscription TTC</p>
                          </div>
                          <div class="col-xl-2">
                            <p class="float-end">10 €
                            </p>
                          </div>
                          <hr style="border: 2px solid black;">
                        </div>
                        <div class="row">
                          <div class="col-xl-10">
                            <p>TVA 20%</p>
                          </div>
                          <div class="col-xl-2">
                            <p class="float-end">1,67 €
                            </p>
                          </div>
                          <hr>
                        </div>
                        <div class="row">
                          <div class="col-xl-10">
                            <p>Frais d'inscription HT</p>
                          </div>
                          <div class="col-xl-2">
                            <p class="float-end">8,33 €
                            </p>
                          </div>
                          <hr style="border: 2px solid black;">
                        </div>
                        <div class="row text-black">

                          <div class="col-xl-12">
                            <p class="float-end fw-bold">Total TTC: 10.00€
                            </p>
                          </div>
                          <hr style="border: 2px solid black;">
                        </div>
                        <div class="text-center" style="margin-top: 90px;">

                          <p>Le Comité des Fetes et la ville de LONGUENESSE vous remercient de votre participation à ce
                            concours. </p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-floating alert alert-success text-center">
              <p>Voici ta facture. Tu peux demander un remboursemment en la présentant si tu annule dans les 4 semaines
                avant le debut du concours</p>
            </div>
          </div>
        </div>

      </section>
    </main>
    <!-- Footer-->
    <?php include("includes/footer.php"); ?>
  </body>

  </html>
<?php }
?>