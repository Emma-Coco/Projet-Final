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
    if ($detailReservation == NULL)
        header('location:/vue/error.php?err=5');
    if ($detailReservation['etat'] == 'passee')
        include '../vue/client/avis-sejour.php';
    if ($detailReservation['etat'] == 'courante')
        include '../vue/client/reservation_encours.php';
    if ($detailReservation['etat'] == 'future')
        include '../vue/client/reservation.php';
}

if ($action == 'ajouterAvisReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $avis = $_REQUEST['avis'];
    $reservations = ClientModel::ajouterAvisReservation($id_reservation, $avis, $_SESSION['username']);

    header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=listeReservations');
}


if ($action == 'annulerReservation') {
    $id_reservation = $_REQUEST['id_reservation'];
    $reservations = ClientModel::annulerReservation($id_reservation, $_SESSION['username']);

    header('location:http://localhost:8888/controlleurs/client_controlleur.php?action=listeReservations');
}
?>