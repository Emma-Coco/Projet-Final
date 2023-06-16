<?php
session_start();
require_once '../modele/PubModel.php'; //inclure un fichier de code source dans un autre fichier. 
if (isset($_REQUEST['action']))
    $action = $_REQUEST['action']; // Il recupere le type de la requete, sert a recuperer get et post
else
    $action = 'main';

if ($action == 'main') {
    $logements = PubModel::getLogements(0);
    include '../vue/index.php'; // permet de rediriger vers la page quon souhaite      
}

if ($action == 'login') {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $roles = PubModel::getRoles($username, $password); // appel a la fonction
    if ($roles != NULL) {
        $_SESSION['username'] = $username;
        $_SESSION['roles'] = $roles;
        $logements = PubModel::getLogements(0);
        include '../vue/index.php';
    } else
        header('location:/vue/error.php?err=1');
}

if ($action == 'logout') {
    unset($_SESSION['username']);
    unset($_SESSION['roles']);
    session_destroy();
    header('location:../index.php');
}

if ($action == 'createAccount') {
    $username = $_REQUEST['username'];
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $password = $_REQUEST['password'];
    $mail = $_REQUEST['mail'];
    $phone = $_REQUEST['phone'];

    $confirmation = PubModel::createAccount($username, $first_name, $last_name, $password, $mail, $phone); // appel a la fonction
    if ($confirmation != NULL) {
        $logements = PubModel::getLogements(0);
        include '../vue/index.php';
    } else
        header('location:/vue/error.php?err=2');

}

if ($action == 'detailsLogement') {
    $id_logement = $_REQUEST['id_logement'];
    $logement = PubModel::getDetailsLogement($id_logement);
    if ($logement != NULL)
        include '../vue/details_logement.php';
    else
        header('location:/vue/error.php?err=3');
}

if ($action == 'searchLogements') {
    $destination = $_REQUEST['destination'];
    $depart = $_REQUEST['depart'];
    $arrive = $_REQUEST['arrive'];
    $places = $_REQUEST['places'];

    $logements = PubModel::getLogementsCriteres($destination, $depart, $arrive, $places);
    include '../vue/index.php';
}





?>