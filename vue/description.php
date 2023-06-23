<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Description</title>
  <link rel="shortcut icon" href="/vue/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="/vue/appartement-style.css">
  <link rel="stylesheet" href="/css/styleapp.css">
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<style>
  body {
    font-family: Roboto, sans-serif;
  }
  .user_icon {
    width: 30px;
    height: auto;
    margin: 5px;
  }

  .avis_container {
    display: flex;
    align-items: center;
  }
</style>

<body>

<?php
include '../vue/header_menu.php';
?>


<div class="house-details">
  <div class="house-title">
    <h1>
      <?php echo $logement['name']; ?>
    </h1>
    <div class="row">
      <div>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <span>245 Reviews</span>
      </div>
      <div>
        <p>Location:
          <?php echo $logement['adress']; ?>
        </p>
      </div>
    </div>
  </div>


  <div class="slider">
    <?php $i = 1;
    foreach ($logement['urls'] as $url) {
      echo '<img src="/vue/Images/Appartements_images/' . $url . '" alt="img' . $i . '" ';
      if ($i == 1)
        echo 'class="img__slider active" />';
      else
        echo 'class="img__slider" />';
      $i++;
      echo "\n";
    }
    ?>
    <img src="/vue/Images/Appartements_images/L.1/4.jpg" alt="img1" class="img__slider active" />
    <img src="/vue/Images/Appartements_images/L.1/3.jpg" alt="img2" class="img__slider" />
    <img src="/vue/Images/Appartements_images/L.1/2.jpg" alt="img3" class="img__slider" />
    <img src="/vue/Images/Appartements_images/L.1/1.jpg" alt="img4" class="img__slider" />
    <img src="/vue/Images/Appartements_images/L.1/635b22153277705.632c8689dbf9d.jpg   " alt="img5" class="img__slider" />
    <div class="suivant">
      <i class="fas fa-chevron-circle-right"></i>
    </div>
    <div class="precedent">
      <i class="fas fa-chevron-circle-left"></i>
    </div>
  </div>




  <div class="small-details">
    <br>
    <p>
      <?php echo $logement['number_of_travelers']; ?> personnes &nbsp; &nbsp;
      <?php echo $logement['bedroom_number']; ?> lits &nbsp; &nbsp;
      <?php echo $logement['bathroom_number']; ?> salle de bain
    </p>
    <h4>
      <?php echo $logement['price']; ?>€ / jour
    </h4>
  </div>
  <hr class="liner">
  <?php
  $reponseBooking = "";
  if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $dateNow = new DateTime();
    $dateNow->setTime(0, 0, 0); // Définit l'heure à 00:00:00
    $startDate = getdate(strtotime($_POST['start_date']));
    $endDate = getdate(strtotime($_POST['end_date']));

    if ($startDate[0] >= $dateNow->getTimestamp()) {
      if ($endDate[0] < $startDate[0]) {
        $reponseBooking = '<div style="color: #FF8675; font-size: 20px;">' . "La date de fin du séjour ne peut pas être inférieure à la date de début !" . '</div>';

      } else {
        $isDatesAvailable = BookingManager::isDatesAvailable(date("Y-m-d", $startDate[0]), date("Y-m-d", $endDate[0]), $id_logement);

        if ($isDatesAvailable) {
          if (!isset($_SESSION['username']) || !isset($_SESSION['roles']) || !in_array('client', $_SESSION['roles'])) {
            $reponseBooking = '<div style="font-weight: bold; font-size: 20px; display: inline-block">La plage est libre, aller vous connecter a la page principale pour pouvoir reserver.</div>';
          } else {
            $reponseBooking = '<div style="font-weight: bold; font-size: 20px; display: inline-block">' . "La plage est libre. Souhaitez-vous confirmer cette réservation?" . '</div>';
            $reponseBooking = '<div style="font-weight: bold; font-size: 20px; display: inline-block">' . "La plage est libre. Souhaitez-vous confirmer cette réservation?" . '</div>';
            $reponseBooking .= '<div> <form action="/controlleurs/pub_controlleur.php?action=ConfirmBooking&id_logement=' . $id_logement . '" method="post">';
            $reponseBooking .= '<input type="hidden" name="start_date" value="' . $_POST['start_date'] . '">';
            $reponseBooking .= '<input type="hidden" name="prix" value="' . $logement['price'] . '">';
            $reponseBooking .= '<input type="hidden" name="end_date" value="' . $_POST['end_date'] . '">';
            $reponseBooking .= '<input type="submit" name="confirm_booking" style="background-color: #B4DEB8; padding: 10px; border-radius: 10px; z-index: 30; display: inline-block" value="Confirmer">';
            $reponseBooking .= '</form>';
            $reponseBooking .= '<form action="/controlleurs/pub_controlleur.php?action=CancelBooking&id_logement=' . $id_logement . '" method="post" style="display: inline-block"><input type="submit" name="cancel_booking" style="background-color: #FF8675; display: block; padding: 10px; border-radius: 10px; z-index: 30; display: inline-block" value="Annuler"></form>';
            $reponseBooking .= '</div>';
          }
          $hideForm = true;
        } else {
          $reponseBooking = '<div style="color: #FF8675; font-size: 20px;">' . "Les dates sélectionnées sont déjà réservées." . '</div>';
        }
      }
    } else {
      $reponseBooking = '<div style="color: #FF8675; font-size: 20px;">' . "Vous ne pouvez pas définir une date dans le passé !" . '</div>';
    }
  }
  ?>
  <div style="
  display:flex;
  flex-direction:row;
  justify-content:space-between;
  color:white;
  gap:20px;
  "class="minors">
  <div style="
  display:flex;
  flex-direction:column;
  color:white;
  padding:20px;
  overflow:hidden;
  margin : 0 auto;
  width: 25%;
  box-shadow: 0 0 0 0;
  border : 1px solid black;
  "class="check-form">

    <div class="error">
      <?php
      if (isset($reponseBooking)) {
        echo $reponseBooking;
      }
      if (!isset($hideForm)) {


      ?>
    </div>

      <form class="former" action="../controlleurs/pub_controlleur.php?action=CheckDispo&id_logement=<?= $id_logement ?>"
            method="POST">
        <div  class="start-date" >
          <label for="start_date">Début :</label>
          <input type="date" id="start_date" name="start_date" required><br><br>
        </div>
        <div class="end-date" >
          <label for="end_date">Fin :</label>
          <input type="date" id="end_date" name="end_date" required><br><br>
        </div>
        <!--Création du formulaire avec la date d'arrivée et de départ-->
        <input class="validation" type="submit" value="Vérifier la disponibilité">
        <!--<button type="submit">Check Availability</button>-->
      </form>
      <?php
      }
      ?>
    </div>
    <div class="liste-detail">
      <h1>
        <strong style="font-size: 24px">Ce que propose ce logement</strong>
      </h1>
      <p>

        <?php
        if ($logement['services'] != NULL)
          foreach ($logement['services'] as $service)
            echo $service . ' - ';
        ?>
      </p>
      <hr class="line">


      <p class="home-desc">
        <?php echo $logement['description']; ?>
      </p>

    </div>
  </div>

</div>

<div class="home-description">

  <hr class="line">


  <p class="home-desc">
  <ul>
    <li>Commentaires sur la reservation :</li>

    <?php
    if ($logement['avis'] == NULL)
      echo "pas d'avis sur ce logement";
    else foreach ($logement['avis'] as $username => $avis) {

        echo '<li class="avis_container"><img src="/vue/Images/user.png" class="user_icon"/>' . $username;
        $nb_stars = $avis['stars'];
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $nb_stars)
            echo '<img style="width:20px;height:auto" src="../vue/Images/full_star.png">';
          else
            echo '<img style="width:20px;height:auto" src="../vue/Images/empty_star.png">';
        }
        echo ' : ' . $avis['texte'] . '</li>';
      }

    //   echo '<li class="avis_container"><img src="/vue/Images/user.png" class="user_icon"/>' . $username . ' : ' . $avis . '</li>';
    // }


    ?>
  </ul>
  </p>
  <hr class="line">

  <div class="map">
    <h3>Location on Map</h3>

    <?php

    $logement = PubModel::getDetailsLogement($id_logement);
    // Accéder à la latitude et à la longitude en bdd
    $latitude = $logement['position_lat'];
    $longitude = $logement['position_long'];

    ?>

    <iframe src="https://maps.google.com/maps?q=<?= $latitude ?>,+<?= $longitude ?>+&hl=fr&z=14&amp;output=embed"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>




    <b>Paris, Ile-de-France, France</b>
  </div>





  <div class="footer">
    <hr class="line">
    <p>HETIC 2023.</p>
  </div>
</div>


<?php
require_once '../modele/Booking.php';


$reservedDates = BookingManager::getReservedDates($id_logement);

// Affichage des dates réservées
$calendarDates = "";
foreach ($reservedDates as $reservation) {
  $calendarDates .= "'" . $reservation['starting_date'] . ":" . $reservation['ending_date'] . "',";
}
?>

<script src="/vue/description-appart.js"></script>
<script src="https://kit.fontawesome.com/db48a25407.js" crossorigin="anonymous"></script>


</body>

</html>

<!--//Clé API : AIzaSyDxphlOcEPPpauwmwjkdf4EcIkobl-bORc