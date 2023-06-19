<?php

require_once 'DBConnexion.php';

class ActionEntretien {
  
    public static function getAllElements() {
      // Récupérer la connexion à la base de données
      $con = DBConnexion::getDBConnexion();
  
      // Requête SQL pour récupérer tous les éléments de la table
      $query = "SELECT ae.*, l.adress FROM action_entretien as ae LEFT JOIN logement AS l on l.id = ae.id_logement WHERE date_execution < NOW()";
      $stmt = $con->prepare($query);
      $stmt->execute();
  
      // Récupérer les résultats de la requête
      $elements = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      // Retourner les éléments récupérés
      return $elements;

      foreach ($elements as $element) {
        $entretienUserId = $element['entretien_user_id'];
        $description = $element['desciption'];
        $etatEntretien = $element['etat_dentretien'];
        $idBooking = $element['id_booking'];
        $idLogement = $element['id_logement'];
        $entretienStatus = $element['entretien_status'];
        $dateExecution = $element['date_execution'];
        $adress = $element['adress'];

    } 

  }

}
  

?>
