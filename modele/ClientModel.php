<?php
require_once 'DBConnexion.php'; // c'est comme include si il trouve pas il fait un arret
require_once 'PubModel.php';

class ClientModel
{

    public static function getUserid($username)
    {
        $con = DBConnexion::getDBConnexion();
        $query = " select id from users where username=:username";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            return -1;
        } else {
            return $result[0]['id'];
        }
    }
    public static function getFullname($id_user)
    {
        $con = DBConnexion::getDBConnexion();
        $query = " select concat(first_name,' ',last_name) as fullname from users where id=:id_user";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            return "";
        } else {
            return $result[0]['fullname'];
        }
    }

    public static function calculerDuree($depart, $arrive)
    {
        $datedepart = new DateTime($depart);
        $datearrivee = new DateTime($arrive);
        return ($datedepart->diff($datearrivee))->days + 1;
    }
    public static function reserverLogement($id_logement, $username, $depart, $arrive)
    {
        $con = DBConnexion::getDBConnexion();

        if (!PubModel::isDate($depart) || !PubModel::isDate($arrive)) {
            echo 'date incorrect';
            return false;
        }
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            return false;
        }

        $logement = PubModel::getDetailsLogement($id_logement);
        $nb_jours = self::calculerDuree($depart, $arrive);
        $final_price = $logement['price'] * $nb_jours;
        if (PubModel::logementIsAvailable($id_logement, $depart, $arrive) == true) {
            $query = "insert into booking (starting_date,ending_date,id_logement,id_user,final_price,service_fee,taxes) ";
            $query = $query . " value (:depart, :arrive, :id_logement, :id_user, :final_price, 0, 0 ) ";
            $stmt = $con->prepare($query);
            $stmt->bindValue(':depart', $depart);
            $stmt->bindValue(':arrive', $arrive);
            $stmt->bindParam(':id_logement', $id_logement);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':final_price', $final_price);
            try {
                $stmt->execute(); //execution
            } catch (Exception $e) {
                echo $e;
                return false;
            }
            return true;

        } else {
            echo 'logement non dispo';
            return false;
        }

    }

    public static function modifierReservation($id_reservation, $id_logement, $username, $depart, $arrive)
    {
        $con = DBConnexion::getDBConnexion();

        if (!PubModel::isDate($depart) || !PubModel::isDate($arrive)) {

            return false;
        }

        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            return false;
        }

        if (self::etat_intervalle_date_html($depart, $arrive) != "future")
            return false;

        if (PubModel::logementIsAvailable($id_logement, $depart, $arrive) == true) {
            $query = "update booking set starting_date=:depart, ending_date=:arrive where id=:id_reservation";
            $stmt = $con->prepare($query);
            $stmt->bindValue(':depart', $depart);
            $stmt->bindValue(':arrive', $arrive);
            $stmt->bindParam(':id_reservation', $id_reservation);
            try {
                $stmt->execute(); //execution
            } catch (Exception $e) {
                echo $e;
                return false;
            }
            return true;

        } else {
            echo 'logement non dispo';
            return false;
        }


    }

    public static function getListReservation($username) // On met page pour pouvoir passer le numero de page
    {

        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }
        $con = DBConnexion::getDBConnexion();
        $query = "select name,booking.id as id_booking, id_logement, starting_date, ending_date,final_price from booking inner join logement on booking.id_logement=logement.id where id_user=:id_user ";
        $stmt = $con->prepare($query); // preparation
        $stmt->bindParam(':id_user', $id_user); // parametre

        try {
            $stmt->execute(); //execution
        } catch (Exception $e) {
            echo $e;
            die;
        }

        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC); // lecture des lignes de resultats

        if (!$reservations) {
            return NULL;
        } else {
            $reservations_groupees = [];
            foreach ($reservations as $reservation) {
                $reservation['etat'] = self::etat_intervalle_date($reservation['starting_date'], $reservation['ending_date']);
                $reservations_groupees[] = $reservation;
            }
            return $reservations_groupees;
        }
    }

    public static function etat_intervalle_date($depart, $arrive)
    {
        $dateCourante = date('Y-m-d');
        $etat = "courante";
        if ($arrive < $dateCourante)
            $etat = "passee";
        if ($depart > $dateCourante)
            $etat = "future";
        return $etat;
    }

    public static function etat_intervalle_date_html($depart, $arrive)
    {
        $dateCourante = date('Y-m-d');
        /*$depart = new DateTime($depart);
        $arrive = new DateTime($arrive);*/
        $etat = "courante";
        if ($arrive < $dateCourante)
            $etat = "passee";
        if ($depart > $dateCourante)
            $etat = "future";
        return $etat;
    }

    public static function reservation_authentique($id_reservation, $id_user)
    {
        $con = DBConnexion::getDBConnexion();
        $query = "select id_user from booking where id=:id_reservation";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->execute();
        $reservation = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reservation[0]['id_user'] == $id_user;
    }

    public static function getMessages($id_reservation, $username)
    {
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }
        if (self::reservation_authentique($id_reservation, $id_user) == false) {
            return NULL;
        }
        $con = DBConnexion::getDBConnexion();
        $query = "select text, first_name, last_name, username, messages.id, id_booking, messages.created_at 
        from messages 
        inner join users on users.id=messages.user_id 
        where id_booking=:id_reservation AND response_of_idMessage IS NULL";
        $guery = $query . ' order by timestamp';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$messages)
            return null;
        else
            return $messages;
    }


    public static function getDetailsReservation($id_reservation, $username) // recuperer les url des images de logements
    {
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }

        if (self::reservation_authentique($id_reservation, $id_user) == false) {
            return NULL;
        }

        $con = DBConnexion::getDBConnexion();
        //ramener les donnees de base
        $query = "select booking.*, name from booking inner join logement on booking.id_logement=logement.id where booking.id=:id_reservation";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$reservations) {
            return NULL;
        }
        $detailsReservation = $reservations[0];

        // ramener les urls de sa gallery d'image
        $detailsReservation['messages'] = self::getMessages($id_reservation, $username);
        $detailsReservation['etat'] = self::etat_intervalle_date($detailsReservation['starting_date'], $detailsReservation['ending_date']);
        $detailsReservation['username'] = $username;
        $detailsReservation['fullname'] = self::getFullname($id_user);
        return $detailsReservation;
    }

    public static function ajouterAvisReservation($id_reservation, $avis, $username)
    {
        $con = DBConnexion::getDBConnexion();
        $query = "update booking set avis_client=:avis where id=:id_reservation";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->bindParam(':avis', $avis);
        $stmt->execute();
    }

    public static function ajouterMessageReservation($id_reservation, $message, $username)
    {
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }
        $con = DBConnexion::getDBConnexion();
        $query = "insert into messages (text,id_booking,user_id) value (:message, :id_reservation, :id_user)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
    }

    public static function annulerReservation($id_reservation, $username)
    {
        $con = DBConnexion::getDBConnexion();

        $query = "delete from action_entretien where id_booking=:id_reservation";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->execute();

        $query = "delete from messages where id_booking=:id_reservation";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->execute();

        $query = "delete from booking where id=:id_reservation";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->execute();
    }

    public static function getCompte($username)
    {
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }

        $con = DBConnexion::getDBConnexion();
        $query = "select * from users where id=:id_user";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        $compte = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$compte)
            return NULL;
        return $compte[0];
    }

    public static function modifierNomCompte($first_name, $last_name, $username)
    {
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }

        $con = DBConnexion::getDBConnexion();
        $query = "update users set first_name=:first_name, last_name=:last_name where id=:id_user";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);

        try {
            $stmt->execute(); //execution
        } catch (Exception $e) {
            return false;
        }
        return true;

    }


    public static function modifierEmailCompte($email, $username)
    {
        $id_user = self::getUserid($username);
        if ($id_user == -1) {
            echo 'user introuvable';
            die;
        }

        $con = DBConnexion::getDBConnexion();
        $query = "update users set mail=:email where id=:id_user";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute(); //execution
        } catch (Exception $e) {
            return false;
        }
        return true;

    }
}
?>