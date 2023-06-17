<?php 
include_once('../modele/Logistique.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Vérifier si des données de mise à jour ont été soumises
  if (isset($_POST['action_id']) && isset($_POST['etat_action']) && isset($_POST['description'])) {
    // Récupérer les valeurs de mise à jour
    $actionId = $_POST['action_id'];
    $etatAction = $_POST['etat_action'];
    $description = $_POST['description'];

    // Mettre à jour l'état d'entretien et la description en base de données
    ActionEntretien::updateElement($actionId, $etatAction, $description);
  }
}

?>