<?php
session_start();
require_once '../modele/Booking.php'; //inclure un fichier de code source dans un autre fichier.
$logementId = $_GET["logement_id"];
//header('location:/vue/description.php');

if (isset($_REQUEST['action']))
     $action=$_REQUEST['action']; // Il recupere le type de la requete, sert a recuperer get et post
else 
    $action='main';

    
    
    $reponseBooking = "";

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $dateNow = new DateTime();
    $dateNow->setTime(0, 0, 0); // Définit l'heure à 00:00:00
    $startDate = getdate(strtotime($_POST['start_date']));
    $endDate = getdate(strtotime($_POST['end_date']));
    
    if ($startDate[0] >= $dateNow->getTimestamp()) {
        if ($endDate < $startDate) {
            $reponseBooking = '<div style="position: absolute; top: 980px; color: #FF8675; font-size: 20px;">' . "La date de fin du séjour ne peut pas être inférieure à la date de début !" . '</div>';
        } else {
            $isDatesAvailable = BookingManager::isDatesAvailable(date("Y-m-d", $startDate[0]), date("Y-m-d", $endDate[0]), $logementId);
            
            if($isDatesAvailable){
                
                $reponseBooking = '<div style="position: absolute; top: 1080px; font-weight: bold; font-size: 20px;">' . "La plage est libre. Souhaitez-vous confirmer cette réservation?" . '</div>';


                echo '<div> <form action="/controlleurs/booking_controlleur.php?logement_id='.$logementId.'" method="post">';
                echo '<input type="hidden" name="start_date" value="' . $_POST['start_date'] . '">';
                echo '<input type="hidden" name="end_date" value="' . $_POST['end_date'] . '">';
                echo '<input type="submit" name="confirm_booking" style="background-color: #B4DEB8; position: absolute; top: 1250px; left: 240px; padding: 10px; border-radius: 10px;" value="Confirmer">';
                echo '<input type="submit" name="cancel_booking" style="background-color: #FF8675; position: absolute; top: 1250px; left: 350px; padding: 10px; border-radius: 10px;" value="Annuler">';

                echo '</form> </div>';
            }
            else{
                echo '<div style="position: absolute; top: 1080px; left: 240px; color: #FF8675; font-size: 20px;">' . "Les dates sélectionnées sont déjà réservées." . '</div>';
            }
        }
    } else {
        $reponseBooking = '<div style="position: absolute; top: 980px; color: #FF8675; font-size: 20px;">' . "Vous ne pouvez pas définir une date dans le passé !" . '</div>';
    }
}
 
// Vérifier si le formulaire de confirmation ou d'annulation a été soumis
if (isset($_POST['confirm_booking'])) {
    $con=DBConnexion::getDBConnexion();
    $query = "INSERT INTO booking (starting_date, ending_date, id_logement) ";
    $query .= "VALUES (:starting_date, :ending_date, :id_logement)";
    $stmt = $con->prepare($query);
    $startDate = date("Y-m-d", $startDate[0]);
    $stmt->bindParam(':starting_date', $startDate);
    $endDate = date("Y-m-d", $endDate[0]);
    $stmt->bindParam(':ending_date', $endDate);
    $stmt->bindParam(':id_logement', $_GET['logement_id']);
    $stmt->execute();
    $logement_id = $con->lastInsertId();
    //redirection vers page temporaire 
    header('location:/vue/Validation_reservation.php?startDate=' . urlencode($startDate) . '&endDate=' . urlencode($endDate));
} elseif (isset($_POST['cancel_booking'])) {
    header('location:/controlleurs/pub_controlleur.php?action=main');
}


include('../vue/description.php');


?>