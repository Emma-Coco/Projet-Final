<?php

require_once 'DBConnexion.php';
class MessageRepository {

    public static function getAllMessages() {
        try {
            // Connexion à la base de données avec PDO
            $con=DBConnexion::getDBConnexion();

            // Requête pour récupérer les données de la table "messages"
            $query = "SELECT * FROM messages";
            $stmt = $con->prepare($query);
            $stmt->execute();

            // Récupération des résultats
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Fermeture de la connexion à la base de données
            $con = null;

            return $messages;

            foreach ($messages as $message) {
                $id = $message['id'];
                $text = $message['text'];
                $id_booking = $message['id_booking'];
                $user_id = $message['user_id'];
                $created_at = $message['created_at'];
                } 
                catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
             }
          
        }
    }
}

?>
