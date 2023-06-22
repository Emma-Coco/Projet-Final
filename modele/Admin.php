<?php

require_once 'DBConnexion.php';

class CategoryGestionnaire {

    public static function getAllAccount() {

        try {
            $con = DBConnexion::getDBConnexion();
            $query = "SELECT u.id, u.username, u.first_name, u.last_name, u.mail, u.deleted
                      FROM users u";
            
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

    public static function deleteCompte($id) {

        try {
            $con = DBConnexion::getDBConnexion();
            $query = "UPDATE users SET deleted=1 WHERE id=:id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function restoreCompte($id) {

        try {
            $con = DBConnexion::getDBConnexion();
            $query = "UPDATE users SET deleted=0 WHERE id=:id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function getRoles() {

        try {
            $con = DBConnexion::getDBConnexion();
            $query = "SELECT * FROM role";
            
            $stmt = $con->prepare($query);
            $stmt->execute();

            // Ajoutez le code pour récupérer les variables de la requête ici
            // Par exemple, vous pouvez utiliser $stmt->fetchAll(PDO::FETCH_ASSOC) pour obtenir tous les résultats dans un tableau associatif
            $roles= $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $roles;
            
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function getUserRoles($user_id, $role_id) {

        try {
            $con = DBConnexion::getDBConnexion();
            $query = "SELECT COUNT(user_id) FROM users_role WHERE user_id=:user_id AND role_id=:role_id";
            
            $stmt = $con->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':role_id', $role_id);
            $stmt->execute();

            // Ajoutez le code pour récupérer les variables de la requête ici
            // Par exemple, vous pouvez utiliser $stmt->fetchAll(PDO::FETCH_ASSOC) pour obtenir tous les résultats dans un tableau associatif
            $roles= $stmt->fetchAll(PDO::FETCH_NUM);
            
            return $roles[0][0];
            
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function updateRoles($post, $user_id) {
        $con = DBConnexion::getDBConnexion();
            $query = "DELETE FROM users_role WHERE user_id=:user_id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
        foreach($post as $check){
            $query = "INSERT INTO users_role(user_id, role_id) VALUE (:user_id, :role_id)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':role_id', $check);
            $stmt->execute();
        }
        
    }

}

?>
