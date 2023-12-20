<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/stylesBootstrap.css" rel="stylesheet" />
        <title><?php echo $title ?></title>
        <style>
        body{
        background-image: url(assets/fond-ecran.jpg);
        background-size:100%;
        background-attachment: fixed;}
        </style>
    </head>
  
<?php
$title = "FacturePdf";

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


      <!-- Page content-->
      <section class="py-1">
        <div class="container px-5">
          <!-- Contact form-->
          <div class="bg-light rounded-4  px-4 px-md-5">

            <div class="row gx-3 justify-content-center">
              <div class="col-md-10 col-xl-10">

                <div id="imprim" class="form-floating">
                  <div class="card">
                    <div class="card-body mx-4">
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

          </div>
        </div>

      </section>
    </main>

  </body>

  </html>
<?php } ?>