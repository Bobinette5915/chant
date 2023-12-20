<?php
$title = "Choix du Titre";
include("includes/head.php");
include("includes/connexionBDD.php");
include("API_musique.php");

?>

    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
<?php
include("includes/navbar.php");
include 'includes/play.php';
?>




<?php include("includes/footer.php"); ?>
    <script src="js/scripts.js"></script>
 </body>
</html>