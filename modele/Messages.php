<?php
require_once 'DBConnexion.php';

class MessageRepository {
    public static function getAllMessages() {
        try {
            // Connexion à la base de données avec PDO
            $con = DBConnexion::getDBConnexion();

            // Requête pour récupérer les données de la table "messages"
            $query = "SELECT m.id AS id_message, m.*, u.*, l.*, b.*
                        FROM messages AS m
                        JOIN users AS u ON u.id = m.user_id
                        JOIN booking AS b ON m.id_booking = b.id
                        JOIN logement AS l ON l.id = b.id_logement
                        WHERE response_of_idMessage IS NULL";

            $stmt = $con->prepare($query);
            $stmt->execute();

            // Récupération des résultats
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Fermeture de la connexion à la base de données
            $con = null;

            return $messages;

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function getAllResponse($id_message) {
        try {
            // Connexion à la base de données avec PDO
            $con = DBConnexion::getDBConnexion();

            // Requête pour récupérer les données de la table "messages"
            $query = "SELECT m.* FROM messages AS m WHERE response_of_idMessage =:response_of_idMessage";

            $stmt = $con->prepare($query);
            $stmt->bindParam(':response_of_idMessage', $id_message);
            $stmt->execute();

            // Récupération des résultats
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Fermeture de la connexion à la base de données
            $con = null;

            return $messages;

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

if (isset($_POST['message_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à la base de données avec PDO
        $con = DBConnexion::getDBConnexion();

        // Récupération des données du formulaire
        $id_message = $_POST['message_id'];
        $replyText = $_POST['reply_text'];
        $created_at = date('Y-m-d H:i:s'); // Current date and time
            

            // Préparation de la requête d'insertion
            $query = "INSERT INTO messages (text, id_booking, user_id, created_at, response_of_idMessage)
                      VALUES (:text, :id_booking, :user_id, :created_at, :response_of_idMessage)";

            $stmt = $con->prepare($query);

            session_start();
            // Bind des valeurs aux paramètres de la requête
            $stmt->bindParam(':text', $replyText);
            $stmt->bindParam(':id_booking', $_POST['id_booking']);
            $stmt->bindValue(':user_id', $_SESSION['id_user']); // Replace with the actual value or modify the query accordingly
            $stmt->bindParam(':created_at', $created_at);
            $stmt->bindParam(':response_of_idMessage', $_POST['message_id']);

            // Exécution de la requête d'insertion
            $stmt->execute();


        // Fermeture de la connexion à la base de données
        $con = null;

        // Redirection vers la page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
