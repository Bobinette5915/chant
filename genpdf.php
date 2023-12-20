<?php

use Dompdf\Dompdf;
use Dompdf\Options;

include("includes/connexionBDD.php");

ob_start();

include("facturepdf.php");
$html = ob_get_contents();
ob_end_clean();

include ('includes/dompdf/autoload.inc.php');

$options = new Options();
// $options->set();

$dompdf = new dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$fichier = 'Facture concours de Chant';

$dompdf->stream($fichier);
header("location:factures.php");
?>