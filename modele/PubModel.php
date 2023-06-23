<?php
require_once 'DBConnexion.php'; // c'est comme include si il trouve pas il fait un arret

class PubModel
{


    // public static function getPrimaryLogement()
    // {
    // $con = DBConnexion::getDBConnexion();

    // }


    public static function getRoles($username, $password)
    {
        $con = DBConnexion::getDBConnexion();
        $query = " select * from users inner join users_role on users.id=users_role.user_id ";
        $query = $query . "inner join role on users_role.role_id=role.id where username = :username AND users.deleted=0";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return NULL;
        } else {
            if (!password_verify($password, $result[0]['password']))
                return NULL;
            $roles = [];
            foreach ($result as $row) {
                $roles[] = $row['title'];
                $_SESSION['id_user'] = $row['user_id'];
            }
            $_SESSION['roles'] = $roles;
            return $roles;
        }
    }

    public static function createAccount($username, $first_name, $last_name, $password, $mail, $phone)
    {
        // verifier qu'il y a pas un utilisateur existant avec le meme username
        $con = DBConnexion::getDBConnexion();
        $query = "select * from users where username = :username"; // TESTER SI UN UTISILATEUR EXISTE
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return NULL;
        }

        // ajouter les donnees de l'utilisateur a la table users
        $query = "insert into users (username, first_name,last_name, password, mail, phone) ";
        $query = $query . "values (:username, :first_name,:last_name, :password, :mail, :phone) ";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        $user_id = $con->lastInsertId();

        // affecter le role client a l'utilisateur ajoute
        $query = "insert into users_role (user_id, role_id) values (:user_id, 1) ";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return 'ok';
    }


    // fonction qui ramene la liste des logements de la bdd (avec les donnees essentielles uniquement)
    public static function getLogements($page) // On met page pour pouvoir passer le numero de page
    {
        $lim = 1000;
        $ofst = $page * $lim; //c'est pour pouvoir choisir un partie des logements souhaitez d'une partie specifique selectionneer une partie de la reponse
        $con = DBConnexion::getDBConnexion();
        $query = "select logement.id, name, description, price, type from logement inner join type_logement on logement.id_type_logement=type_logement.id  order by logement.id limit $lim offset $ofst"; //Pour limiter le resultat sinon il ramene tous les logements de labbd
        $stmt = $con->prepare($query); // preparation
        //$stmt->bindParam(':lim', $lim); //parametre
        //$stmt->bindParam(':ofst', $ofst); // parametre

        try {
            $stmt->execute(); //execution
        } catch (Exception $e) {
            echo $e;
            die;
        }

        $logements = $stmt->fetchAll(PDO::FETCH_ASSOC); // lecture des lignes de resultats

        if (!$logements) {
            return NULL;
        } else {
            for ($i = 0; $i < count($logements); $i++) {
                // ramener aussi la premiere url d'image pour l'appercu
                $logements[$i]['url'] = self::getLogementImages($logements[$i]['id'])[0];
            }

            return $logements;
        }
    }

    public static function isDate($dateString)
    {
        if (!isset($dateString) || $dateString == NULL)
            return false;
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        return ($date && $date->format('Y-m-d') === $dateString);
    }

    public static function convertDateBDDFormat($dateString)
    {
        /*$date = DateTime::createFromFormat('d/m/Y', $dateString);
        $formattedDate = $date->format('Y-m-d');
        return $formattedDate;*/
        return $dateString;
    }

    public static function logementIsAvailable($id_logement, $depart, $arrive)
    {
        $depart = self::convertDateBDDFormat($depart);
        $arrive = self::convertDateBDDFormat($arrive);
        $con = DBConnexion::getDBConnexion();
        $query = "select * from booking where id_logement =:id_logement";
        $query = $query . " and cancelled!=1 and (( :depart between starting_date AND ending_date) OR ( :arrive between starting_date AND ending_date)) ";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_logement', $id_logement); //parametre
        $stmt->bindValue(':depart', $depart);
        $stmt->bindValue(':arrive', $arrive);

        try {
            $stmt->execute(); //execution
        } catch (Exception $e) {
            echo $e;
            die;
        }

        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC); // lecture des lignes de resultats

        if (!$bookings || count($bookings) == 0)
            return true;
        else
            return false;

    }


    public static function getLogementsCriteres($destination, $depart, $arrive, $places)
    {
        $con = DBConnexion::getDBConnexion();
        $destination_criteria = " true ";
        $date_criteria = false;
        $places_criteria = " true ";

        if (strlen($destination) > 0) {
            $destination_criteria = " adress like '%" . $destination . "%'";
        }

        if (self::isDate($depart) && self::isDate($arrive)) {
            $date_criteria = true;
        }

        if (ctype_digit($places)) {
            $places_criteria = " number_of_travelers = " . $places;
        }

        $query = "select logement.id, name, description, price, type from logement inner join type_logement ";
        $query = $query . "on logement.id_type_logement=type_logement.id  where $destination_criteria and $places_criteria";
        $query = $query . " order by logement.id ";
        $stmt = $con->prepare($query);
        //$stmt->bindParam(":destination_criteria", $destination_criteria);
        //$stmt->bindParam(":places_criteria", $places_criteria);
        try {
            $stmt->execute(); //execution
//            echo '[' . $stmt->queryString . ']';
            //           die;

        } catch (Exception $e) {
            echo $e;
            die;
        }

        $logements = $stmt->fetchAll(PDO::FETCH_ASSOC); // lecture des lignes de resultats
        $logements_disponibles = [];
        if (!$logements) {
            return NULL;
        } else {
            for ($i = 0; $i < count($logements); $i++) {
                // ramener aussi la premiere url d'image pour l'appercu
                if (!$date_criteria || self::logementIsAvailable($logements[$i]['id'], $depart, $arrive) == true) {
                    $logements[$i]['url'] = self::getLogementImages($logements[$i]['id'])[0];
                    $logements_disponibles[] = $logements[$i];
                }
            }

            return $logements_disponibles;

        }
    }



    // une fonction qui ramene tous les details de donnees sur un logement specifique (pour la page detail de logement)
    public static function getDetailsLogement($id_logement) // recuperer les url des images de logements
    {
        $con = DBConnexion::getDBConnexion();

        //ramener les donnees de base
        $query = "select logement.id, name, description, price, adress, type, position_lat, position_long, bedroom_number, kitchen, bathroom_number, number_of_travelers from logement inner join type_logement on logement.id_type_logement=type_logement.id  where logement.id=:id_logement"; //Pour limiter le resultat sinon il ramene tous les logements de labbd        
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_logement', $id_logement);
        $stmt->execute();
        $logement_ = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$logement_) {
            return NULL;
        }
        $logement = $logement_[0];

        // ramener les urls de sa gallery d'image
        $logement['urls'] = self::getLogementImages($id_logement);

        // ramener les services offerts par le logement
        $logement['services'] = self::getLogementServices($id_logement);

        // ramene les avis sur le logement sous forme de dictionnaire [username]=[stars,avis]
        $logement['avis'] = self::getLogementAvis($id_logement);

        return $logement;
    }


    // function qui ramene les services d'un logement specifique (selon le id du logement passe en parametre) 
    public static function getLogementServices($id_logement)
    {
        $con = DBConnexion::getDBConnexion();
        $query = " select title from service inner join service_logement on service.id=service_logement.id_service where id_logement=:id_logement";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_logement', $id_logement);
        $stmt->execute();
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$resultat) {
            return NULL;
        } else {
            $services = [];
            foreach ($resultat as $row) {
                $services[] = $row['title'];
            }
            return $services;
        }
    }


    // function qui ramene les urls d'un logement specifique (selon le id du logement passe en parametre)
    public static function getLogementImages($id_logement) // recuperer les url des images de logements
    {
        $con = DBConnexion::getDBConnexion();
        $query = " select url from picture where id_logement=:id_logement";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_logement', $id_logement);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$images) {
            return NULL;
        } else {
            $img_url = [];
            foreach ($images as $row) {
                $img_url[] = $row['url'];
            }
            return $img_url;
        }
    }


    public static function getAllDestinations()
    {
        try {
            $con = DBConnexion::getDBConnexion();
            $query = "SELECT DISTINCT SUBSTRING_INDEX(adress, ' ', 1) AS arrondissement FROM logement";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $addresses = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $destinations = [];

            foreach ($addresses as $address) {
                // Extraction du nombre de l'arrondissement
                $arrondissement = '';
                preg_match('/(\d+)/', $address, $matches);
                if (!empty($matches)) {
                    $arrondissement = $matches[0];
                }
                $destinations[] = $arrondissement . 'è arrondissement';
            }

            return $destinations;
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function getLogementAvis($id_logement)
    {
        $con = DBConnexion::getDBConnexion();
        $query = "select avis_client, stars, username from booking inner join users on users.id=booking.id_user where id_logement=:id_logement";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_logement', $id_logement);
        $stmt->execute();
        $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$avis) {
            return NULL;
        } else {
            $avis_dic = [];
            foreach ($avis as $avi) {
                $avis_dic[$avi['username']] = ['stars' => $avi['stars'], 'texte' => $avi['avis_client']];
            }
            return $avis_dic;
        }
    }

}




?>