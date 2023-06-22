<?php 
if(!isset($_GET['action']) || $_GET['action']=='AfficherLesComptes'){
include_once('../modele/Admin.php');
// Récupérer tous les éléments d'entretien
$accounts = CategoryGestionnaire::getAllAccount();
include_once('../vue/AfficherLesComptes.php');
    
}

if(isset($_GET['action']) && $_GET['action']=='deleteCompte'){
include_once('../modele/Admin.php');  
CategoryGestionnaire::deleteCompte($_GET['id']);
include_once('../vue/AfficherLesComptes.php');
}

?>

