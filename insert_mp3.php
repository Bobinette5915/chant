<?php
  /*  error_reporting(E_ALL);
ini_set('display_errors', 1);  */  
$title = "Choix du Titre";
include("includes/head.php");
include 'includes/connexionBDD.php';
session_start();
$sql = "SELECT * FROM `participants` WHERE `email` = :adresseMail";
$query = $db->prepare($sql);
$query->bindValue(":adresseMail", $_SESSION['ID-Utilisateur'], PDO::PARAM_STR);
$query->execute();
$controleID = $query->fetch();


// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le fichier a été uploadé sans erreur
    if (isset($_FILES["fichier_audio"]) && $_FILES["fichier_audio"]["error"] == 0) {
        // Vérifie le type MIME du fichier
        $allowedTypes = array("audio/mpeg", "audio/mp3");

        if (in_array($_FILES["fichier_audio"]["type"], $allowedTypes)) {
            // Déplace le fichier du répertoire temporaire vers un emplacement permanent
            $destination = "upload/" . $_FILES["fichier_audio"]["name"];
            
            if (move_uploaded_file($_FILES["fichier_audio"]["tmp_name"], $destination)) {
                // Le fichier audio a été téléchargé avec succès, maintenant mettez à jour la base de données
                
                // Mise à jour de la colonne chemin_fichier_audio dans la table appropriée
                $sql = "UPDATE `musique` SET `bande_son`=:cheminFichier WHERE `id_user`=:idUtilisateur";
                // $sql = "UPDATE `musique` SET `bande_son`=:cheminFichier WHERE `id_user` = '16'";
                $query = $db->prepare($sql);
                $query->bindValue(':cheminFichier', $destination, PDO::PARAM_STR);
                $query->bindValue(':idUtilisateur', $controleID['id'], PDO::PARAM_INT);
                $query->execute();
                // echo "Le fichier audio a été téléchargé avec succès. <br>";  
                // echo($destination.'<br>')  ;  
                // echo($controleID['id'])   ;     
                   
            } 
            //else {
            //     echo "Une erreur s'est produite lors du téléchargement du fichier.";
            // }
        } else {
            echo "Erreur : Veuillez télécharger un fichier audio valide (MP3).";
        }
    } else {
        echo "Erreur : " . $_FILES["fichier_audio"]["error"];
    }
}
?>



            <!-- Page content-->
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
include("includes/navbar.php");
?>




            <!-- Page content-->
            <body class="d-flex flex-column">
        
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Insére Ta bande de Son</h1>
                            <p class="lead fw-normal text-muted mb-0">Tu en es capable !!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            
                            <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload Fichier Audio (MP3)</h2>
        <label for="fichier_audio">Fichier Audio (MP3) :</label>
        <input type="file" name="fichier_audio" id="fichier_audio" accept=".mp3">
        <input type="submit" name="submit" value="Upload">
    </form>
                            <?php
                                $sql = "SELECT * FROM `musique` WHERE `bande_son` = :son";
                                $query = $db->prepare($sql);
                                $query->bindValue(":son", $destination, PDO::PARAM_STR);
                                $query->execute();
                                $controleson = $query->fetch();

                                if ($controleson !== false) {
                                    echo('<br><div class="form-floating mb-3 alert alert-success text-center">
                                    <p> Votre bande son a bien été téléchargée.</p></div>');
                                }
                                else {
                                    echo ('<div class="alert alert-danger" role="alert">
                                    Une erreur est apparue lors du téléchargement du fichier.</div>');
                                }
                            ?>
                           
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php include("includes/footer.php"); ?>
    </body>
</html>
