<?php


require_once '../modele/Booking.php';
require_once '../modele/ClientModel.php';

$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];
$finalPrice = ClientModel::calculerDuree($startDate, $endDate) * $_POST['prix'];
// Vérifier si le formulaire de confirmation ou d'annulation a été soumis
if (isset($_POST['confirm_booking'])) {
    $con = DBConnexion::getDBConnexion();
    $query = "INSERT INTO booking (starting_date, ending_date, id_logement,final_price, service_fee,taxes,id_user) ";
    $query .= "VALUES (:starting_date, :ending_date, :id_logement,:final_price,0,0,:id_user)";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':starting_date', $startDate);
    $stmt->bindParam(':ending_date', $endDate);
    $stmt->bindParam(':id_logement', $_GET['id_logement']);
    $stmt->bindParam(':final_price', $finalPrice);
    $stmt->bindParam(':id_user', $_SESSION['id_user']);


    $stmt->execute();
    $id_booking = $con->lastInsertId();


    $query = "INSERT INTO action_entretien (`entretien_user_id`, `desciption`, `etat_dentretien`, `id_booking`, `id_logement`, `entretien_status`, `date_execution`) ";
    $query .= "VALUES (:entretien_user_id, :desciption, :etat_dentretien, :id_booking, :id_logement, :entretien_status, :date_execution)";

    $stmt = $con->prepare($query);

    $value = 1;
    $menage = "menage";
    $toDO = "À faire";

    $stmt->bindParam(':entretien_user_id', $value);
    $stmt->bindParam(':desciption', $menage);
    $stmt->bindParam(':etat_dentretien', $menage);
    $stmt->bindParam(':id_booking', $id_booking);
    $stmt->bindParam(':id_logement', $_GET['id_logement']);
    $stmt->bindParam(':entretien_status', $toDO);
    $stmt->bindParam(':date_execution', $endDate);

    $stmt->execute();

}

echo '<h1>Réservation réalisée avec succès</h1>';
echo 'Votre réservation en date du ' . $startDate . ' jusqu\'au ' . $endDate . ' a bien été enregistrée.';

?>

<a href="/controlleurs/pub_controlleur.php?action=main">Retour à l'accueil</a>