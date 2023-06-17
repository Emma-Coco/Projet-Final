
<?php

require_once 'DBConnexion.php';



        
class BookingManager {


    public static function getReservedDates($logementId) {

        try {
            $con=DBConnexion::getDBConnexion();
            $query = "SELECT starting_date, ending_date FROM booking WHERE id_logement = :logementId AND cancelled = 0";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':logementId', $logementId, PDO::PARAM_INT);
            $stmt->execute();
            $reservedDates = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reservedDates;
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function isDatesAvailable($start_date, $end_date, $id_logement) {

        try {
            $con=DBConnexion::getDBConnexion();
            $query = "SELECT id
                      FROM booking 
                      WHERE id_logement = :logementId 
                        AND NOT((:start_date > starting_date) AND (:start_date < ending_date)) 
                        AND NOT((:end_date > starting_date) AND (:end_date < ending_date))
                        AND NOT((starting_date < :start_date) AND (ending_date > :end_date))
                        AND (cancelled = 0)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':logementId', $id_logement, PDO::PARAM_INT);
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);
            $stmt->execute();

            $reservedDates = $stmt->fetchColumn();

            return $reservedDates;
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function insertDate($start_date,$end_date){
        try {
            $con=DBConnexion::getDBConnexion();
            // Préparation de la requête d'insertion
            $stmt = $con->prepare("INSERT INTO booking (starting_date, ending_date) VALUES (:start_date, :end_date)");

            // Liaison des valeurs aux paramètres de la requête
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);

            // Exécution de la requête
            $stmt->execute();

            echo "Réservation enregistrée avec succès !";
        } catch(PDOException $e) {
            echo "Erreur lors de l'enregistrement de la réservation : " . $e->getMessage();
        }
    }
}

?>



