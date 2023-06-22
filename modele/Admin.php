<?php

require_once 'DBConnexion.php';

class CategoryGestionnaire {

    public static function getAllAccount() {

        try {
            $con = DBConnexion::getDBConnexion();
            $query = "SELECT u.id, u.username, u.first_name, u.last_name, u.mail, r.id
                      FROM users u
                      LEFT JOIN role r ON u.id = r.id";
            
            $stmt = $con->prepare($query);
            $stmt->execute();

            // Ajoutez le code pour récupérer les variables de la requête ici
            // Par exemple, vous pouvez utiliser $stmt->fetchAll(PDO::FETCH_ASSOC) pour obtenir tous les résultats dans un tableau associatif
            $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $accounts;
            
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}

?>
