<?php

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

echo '<h1>Réservation réalisée avec succès</h1>';
echo 'Votre réservation en date du ' . $startDate . ' jusqu\'au ' . $endDate . ' a bien été enregistrée.';

?>

<a href="/controlleurs/pub_controlleur.php?action=main">Retour à l'accueil</a>
