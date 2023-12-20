<?php
include("includes/connexionBDD.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$modif = $_GET['modif'];
$compte = $_GET['idCompte'];
echo("controle1");

echo($modif);
echo($compte);

    
    $sql = "UPDATE `participants` SET `etat`= :nouveau WHERE `id`= :mail";
    $query = $db->prepare($sql);
    $query->bindvalue(":nouveau",$modif,PDO::PARAM_STR);
    $query->bindvalue(":mail",$compte,PDO::PARAM_STR);
    $query->execute();
    echo("controle3");
    header("location:administrateur.php");

?>