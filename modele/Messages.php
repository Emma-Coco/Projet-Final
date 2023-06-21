<?php
require_once 'DBConnexion.php';

class MessageRepository {
    public static function getAllMessages() {
        try {
            // Connexion à la base de données avec PDO
            $con = DBConnexion::getDBConnexion();

            // Requête pour récupérer les données de la table "messages"
            $query = "SELECT m.*, u.*, l.*, b.*
                        FROM messages AS m
                        JOIN users AS u ON u.id = m.user_id
                        JOIN booking AS b ON m.id_booking = b.id
                        JOIN logement AS l ON l.id = b.id_logement";

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
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à la base de données avec PDO
        $con = DBConnexion::getDBConnexion();

        // Récupération des données du formulaire
        $id_message = $_POST['message_id'];
        $replyText = $_POST['reply_text'];
        $created_at = date('Y-m-d H:i:s'); // Current date and time

        // Requête pour récupérer l'id_booking en fonction de l'id du message
        $query = "SELECT id_booking FROM messages WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id_message);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Requête pour récupérer l'user_id en fonction de l'user gestionnaire
        $query = "SELECT id FROM users WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $id_booking = $result['id_booking'];

            // Préparation de la requête d'insertion
            $query = "INSERT INTO messages (id, text, id_booking, user_id, created_at)
                      VALUES (:id, :text, :id_booking, :user_id, :created_at)";

            $stmt = $con->prepare($query);

            // Bind des valeurs aux paramètres de la requête
            $stmt->bindParam(':id', $id_message);
            $stmt->bindParam(':text', $replyText);
            $stmt->bindParam(':id_booking', $id_booking);
            $stmt->bindValue(':user_id', $user_id); // Replace with the actual value or modify the query accordingly
            $stmt->bindParam(':created_at', $created_at);

            // Exécution de la requête d'insertion
            $stmt->execute();
        }

        // Fermeture de la connexion à la base de données
        $con = null;

       /* // Redirection vers la page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    } */
    }
}
?>
