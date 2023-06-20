<?php
session_start();
require_once '../modele/ClientModel.php'; //inclure un fichier de code source dans un autre fichier. 

if (!isset($_SESSION['username']) || !isset($_SESSION['roles']))
    header('location:/vue/error.php?err=4');

if (!in_array('client', $_SESSION['roles']))
    header('location:/vue/error.php?err=4');

if (!isset($_REQUEST['action']))
    header('location:/vue/error.php?err=4');

$action = $_REQUEST['action']; // Il recupere le type de la requete, sert a recuperer get et post

if ($action == 'reserverLogement') {
    $id_logement = $_REQUEST['id_logement'];
    $depart = $_REQUEST['depart'];
    $arrive = $_REQUEST['arrive'];

    $confirmation = ClientModel::reserverLogement($id_logement, $_SESSION['username'], $depart, $arrive);
    if ($confirmation == true) {
        include '../vue/index.php';
    } else
        echo 'echec de reservation';
}

if ($action == 'reserverLogement') {
    $id_logement = $_REQUEST['id_logement'];
    $depart = $_REQUEST['depart'];
    $arrive = $_REQUEST['arrive'];

    $confirmation = ClientModel::reserverLogement($id_logement, $_SESSION['username'], $depart, $arrive);
    if ($confirmation == true) {
        include '../vue/index.php';
    } else
        echo 'echec de reservation';
}

if ($action == 'listeReservations') {
    $reservations = ClientModel::getListReservation($_SESSION['username']);
    include '../vue/client/liste-reservation.php';
}

if ($action == 'detailsReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $detailReservation = ClientModel::getDetailsReservation($id_reservation, $_SESSION['username']);
    if (isset($_REQUEST['alert']))
        $alert = $_REQUEST['alert'];
    else
        $alert = NULL;
    if ($detailReservation == NULL)
        header('location:/vue/error.php?err=5');
    if ($detailReservation['etat'] == 'passee')
        include '../vue/client/avis-sejour.php';
    if ($detailReservation['etat'] == 'courante')
        include '../vue/client/reservation_encours.php';
    if ($detailReservation['etat'] == 'future')
        include '../vue/client/reservation_future.php';
}



if ($action == 'ajouterAvisReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $avis = $_REQUEST['avis'];
    ClientModel::ajouterAvisReservation($id_reservation, $avis, $_SESSION['username']);

    header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=listeReservations');
}


if ($action == 'ajouterMessageReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $message = $_REQUEST['message'];
    ClientModel::ajouterMessageReservation($id_reservation, $message, $_SESSION['username']);

    header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=detailsReservation&id_reservation=' . $id_reservation);
}


if ($action == 'annulerReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $reservations = ClientModel::annulerReservation($id_reservation, $_SESSION['username']);

    header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=listeReservations');
}


if ($action == 'modifierReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $id_logement = $_REQUEST['id_logement'];
    $depart = $_REQUEST['depart'];
    $arrive = $_REQUEST['arrive'];
    $confirmation = ClientModel::modifierReservation($id_reservation, $id_logement, $_SESSION['username'], $depart, $arrive);
    if ($confirmation == true) {
        header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=detailsReservation&id_reservation=' . $id_reservation . '&alert=good');
    } else
        header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=detailsReservation&id_reservation=' . $id_reservation . '&alert=false');
}

if ($action == 'monCompte') {

    $compte = ClientModel::getCompte($_SESSION['username']);
    if ($compte != NULL) {
        include '../vue/client/informations-perso.php';
    } else
        header('location:/vue/error.php?err=6');
}

if ($action == 'modifierNomCompte') {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $confirmation = ClientModel::modifierNomCompte($first_name, $last_name, $_SESSION['username']);
    if ($confirmation == true) {
        header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=monCompte');
    } else
        header('location:/vue/error.php?err=7');
}


if ($action == 'modifierEmailCompte') {
    $email = $_REQUEST['email'];
    $confirmation = ClientModel::modifierEmailCompte($email, $_SESSION['username']);
    if ($confirmation == true) {
        header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=monCompte');
    } else
        header('location:/vue/error.php?err=7');
}


if ($action == 'historiqueMessageReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $messages = ClientModel::getMessages($id_reservation, $_SESSION['username']);
    if ($messages == NULL)
        header('location:/vue/error.php?err=5');

    include '../vue/client/messagerie.php';
}



?>