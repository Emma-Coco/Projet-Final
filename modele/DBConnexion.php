<?php
class DBConnexion
{

    private static $con = NULL;

    public static function getDBConnexion()
    {

        if (self::$con != NULL && self::$con->getAttribute(PDO::ATTR_CONNECTION_STATUS) === 'Connected') { // pour eviter douvrir une connexion a la bddd a chaque requete
            return self::$con;
        }

        $host_dbname = "mysql:host=localhost;port=8889;dbname=wertheimer_bdd";
        $bdd_username = "root";
        $bdd_password = "root";

        // fonction du packet mysqli pour l'acces a la bdd mysql
        try {
            self::$con = new PDO($host_dbname, $bdd_username, $bdd_password); //ouverture de connexion avec la bdd   
        } catch (PDOException $e) {
            die('erreur de connexion a la bdd: ' . $e);
        }

        return self::$con;

    }

}
?>