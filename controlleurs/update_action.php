<?php
require_once '../modele/Logistique.php';

print_r($_POST);

//1. Créer un imput action pour les textarea
//2. Ici, faire un if (action 1 ou action 2?)
//3. Coder l'action 1 et coder l'action 2 => il s'agit d'update
//UPDATE NOM_De_La_Table SET Nom_de_la_colonne = NouvelleValeur WHERE (trouver un index)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le formulaire rouge est soumis
    if ($_POST["action_id"] == "rouge") {
        $id = $_POST["id"];
        $actionEntretien = $_POST["action_entretien"];
        $descriptionActions = $_POST["description_actions"];

        // Effectuer la requête UPDATE pour mettre à jour les informations de l'action d'entretien dans la BDD
        $query = "UPDATE action_entretien SET etat_dentretien = :actionEntretien, desciption = :descriptionActions WHERE id = :id";

        // Exécuter la requête préparée en utilisant PDO ou une autre bibliothèque de gestion de la BDD
        // $pdo est votre objet PDO déjà initialisé
        $con=DBConnexion::getDBConnexion();
        $stmt = $con->prepare($query);
        $stmt->bindParam(':actionEntretien', $actionEntretien);
        $stmt->bindParam(':descriptionActions', $descriptionActions);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Informations de l'action d'entretien mises à jour : $actionEntretien, $descriptionActions";
    }

    // Vérifier si le formulaire bleu est soumis
    elseif ($_POST["action_id"] == "bleu") {
        $id = $_POST["id"];
        $etatAction = $_POST["etat_action"];

        // Effectuer la requête UPDATE pour mettre à jour l'état de l'action dans la BDD
        $query = "UPDATE action_entretien SET entretien_status = :etatAction WHERE id = :id";

        // Exécuter la requête préparée en utilisant PDO ou une autre bibliothèque de gestion de la BDD
        // $pdo est votre objet PDO déjà initialisé
        $con=DBConnexion::getDBConnexion();
        $stmt = $con->prepare($query);
        $stmt->bindParam(':etatAction', $etatAction);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "État de l'action mis à jour : $etatAction";
    }
}


?>