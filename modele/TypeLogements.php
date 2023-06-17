<?php
require_once 'DBConnexion.php'; // c'est comme include si il trouve pas il fait un arret

class typeLogement {


public static function getTypeLogements()
{
    $con=DBConnexion::getDBConnexion();
    $query=" SELECT * FROM `type_logement` ";
    $stmt=$con->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $ToReturn = "";
    foreach($result as $row)
    {
        //On concatène les id et les types de logements
        $ToReturn.="<option value=".$row["id"].">".$row["type"]."</option>"; 
    }

    return $ToReturn;

}

public static function GetAllService(){
    $con=DBConnexion::getDBConnexion();
        $query = "SELECT * FROM service";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($services as $service) {
            $service_id = $service['id'];
            $service_title = $service['title'];
            echo '<input type="checkbox" id="service_' . $service_id . '" name="services[]" value="' . $service_id . '">';
            echo '<label for="service_' . $service_id . '">' . $service_title . '</label><br>';
            }
        }
}