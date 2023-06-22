<?php 
include_once('../modele/Admin.php');
// Récupérer tous les éléments d'entretien
$accounts = CategoryGestionnaire::getAllAccount();
?>

<?php
// Parcourir les comptes et les afficher
foreach ($accounts as $account) {
    echo "ID: " . $account['id'] . "<br>";
    echo "Username: " . $account['username'] . "<br>";
    echo "First Name: " . $account['first_name'] . "<br>";
    echo "Last Name: " . $account['last_name'] . "<br>";
    echo "Email: " . $account['mail'] . "<br>";
    echo "Role ID: " . $account['id'] . "<br>";
    echo "<br>";
}
?>
