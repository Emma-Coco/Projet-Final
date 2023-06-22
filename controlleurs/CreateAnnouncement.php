<?php
require_once '../modele/DBConnexion.php';

$con = DBConnexion::getDBConnexion();

echo '<pre>';
var_dump($_REQUEST);
echo '</pre>';

$query = "INSERT INTO logement (name, description, position_lat, position_long, adress, number_of_travelers, price, id_type_logement, bedroom_number, kitchen, bathroom_number, created_at) ";
$query .= "VALUES (:name, :description, :position_lat, :position_long, :adress, :number_of_travelers, :price, :id_type_logement, :bedroom_number, :kitchen, :bathroom_number, :created_at)";
$stmt = $con->prepare($query);
$stmt->bindParam(':name', $_REQUEST["nom"]);
$stmt->bindParam(':description', $_REQUEST["description"]);
$stmt->bindParam(':position_lat', $_REQUEST["latitude"]);
$stmt->bindParam(':position_long', $_REQUEST["longitude"]);
$stmt->bindParam(':adress', $_REQUEST["adresse"]);
$stmt->bindParam(':number_of_travelers', $_REQUEST["voyageurs"]);
$stmt->bindParam(':price', $_REQUEST["prix"]);
$stmt->bindParam(':id_type_logement', $_REQUEST["typeLogement"]);
$stmt->bindParam(':bedroom_number', $_REQUEST["chambres"]);
$stmt->bindParam(':kitchen', $_REQUEST["cuisine"]);
$stmt->bindParam(':bathroom_number', $_REQUEST["sallesDeBain"]);
$stmt->bindParam(':created_at', $_REQUEST["dateCreation"]);
$stmt->execute();
$logement_id = $con->lastInsertId();

//ajout des services

$con = DBConnexion::getDBConnexion();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $services = $_POST["services"];
    $created_at = $_POST["created_at"];

    foreach ($services as $service_id) {
        $query = "INSERT INTO service_logement (id_service, id_logement, created_at) VALUES (:id_service, :id_logement, :created_at)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_service', $service_id);
        $stmt->bindParam(':id_logement', $logement_id);
        $stmt->bindParam(':created_at', $created_at);

        if ($stmt->execute()) {
            echo "Service ajouté avec succès : Service ID = " . $service_id . "<br>";
        } else {
            echo "Erreur lors de l'ajout du service : " . $stmt->errorInfo()[2] . "<br>";
        }
    }
}

// Récupérer les images, de manière récursive, incluses dans chaque sous-dossier

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $directory = $_POST["directory"];

    if ($con) {
        // Connexion réussie

        // Vérifier si le répertoire existe
        if (is_dir($directory)) {
            $images = getImagesFromDirectory($directory);

            // Insérer les URL des images dans la table "picture" avec l'ID du logement
            foreach ($images as $image) {
                $sql = "INSERT INTO picture (url, id_logement) VALUES (:url, :id_logement)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':url', $image);
                $stmt->bindParam(':id_logement', $id_logement);
                if ($stmt->execute()) {
                    echo "URL insérée avec succès : " . $image . "<br>";
                } else {
                    echo "Erreur lors de l'insertion de l'URL : " . $stmt->error . "<br>";
                }
            }
        } else {
            echo "Répertoire invalide.";
        }
    } else {
        die("Échec de la connexion à la base de données.");
    }
}

// Fermer la connexion à la base de données MySQL
$con = null;

function getImagesFromDirectory($directory) {
    $images = [];

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

    foreach ($iterator as $file) {
        if ($file->isFile() && isImageFile($file)) {
            $images[] = $file->getPathname();
        }
    }

    return $images;
}

function isImageFile($file) {
    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
    $fileExtension = strtolower($file->getExtension());

    return in_array($fileExtension, $allowedExtensions);
}
?>
