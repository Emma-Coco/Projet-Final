<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Description</title>
  <link rel="stylesheet" href="../vue/appartement-style.css">
  <link rel="stylesheet" href="../css/styleapp.css">
  <link rel="stylesheet" href="../css/vanilla-calendar/vanilla-calendar.min.css">
  <link rel="stylesheet" href="../css/vanilla-calendar/themes/light.min.css">
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>

<style type="text/css">
        .NonReserve {
          background-color:white !important;
          color:white !important;
        }
        .Reserve {
          background-color:yellow !important;
          color:yellow !important;
        }
        .Modified {
          background-color:pink !important;
          color:red !important;
        }
      </style>



<nav id="navBar" class="navbar-white">
    <img src="/Appartements_Images/logomarque.svg" class="logo">
    <ul class="nav-links">
      <li><a href="#" class="active"> Popular Places</a></li>
      <li><a href="#">Travel Outside</a> </li>
      <li><a href="#">Online Packages</a> </li>
    </ul>
    <a href="#" class="register-btn">RegisterNow</a>
    <i class="fas fa-bars" onclick="togglebtn()"></i>

  </nav>
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
      <div class="suivant">
        <i class="fas fa-chevron-circle-right"></i>
      </div>
      <div class="precedent">
        <i class="fas fa-chevron-circle-left"></i>
      </div>
    </div>




    <div class="small-details">
      <h2>Entire rental unit hosted by Charles</h2>
      <p>
        <?php echo $logement['number_of_travelers']; ?> guest &nbsp; &nbsp;
        <?php echo $logement['bedroom_number']; ?> beds &nbsp; &nbsp;
        <?php echo $logement['bathroom_number']; ?> bathroom
      </p>
      <h4>
        <?php echo $logement['price']; ?>€ / day
      </h4>
    </div>
    <hr class="line">


    <form class="check-form" action="../controlleurs/booking_controlleur.php" method="POST">
      <div class="error">
        <?php
        if (isset($reponseBooking)) {
          echo $reponseBooking;
        }
        ?>
      </div>
      <div class="start-date">
        <label for="start_date">Arrivée :</label>
        <input type="date" id="start_date" name="start_date" required><br><br>
      </div>
      <div class="end-date">
        <label for="end_date">Départ :</label>
        <input type="date" id="end_date" name="end_date" required><br><br>
      </div>
      <!--Création du formulaire avec la date d'arrivée et de départ-->
      <input class="validation" type="submit" value="Vérifier la disponibilité">
      <div id="calendar"></div>
      <!--<button type="submit">Check Availability</button>-->
    </form>

    <h1>
      Ce que propose ce logement
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
    <hr class="line">

    <div class="map">
      <h3>Location in map</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8726.888177219847!2d2.299557266759769!3d48.86824685430157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1686763098650!5m2!1sfr!2sfr"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <b>Paris, Ile-de-France, France</b>
    <p>It's like a home away from home.</p>
    <hr class="line">







    <div class="footer">
      <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
      <a href="https://youtube.com"><i class="fab fa-youtube"></i></a>
      <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
      <a href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
      <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
      <hr>
      <p>Copyright 2023.</p>
    </div>
  </div>




  <script src="/css/vanilla-calendar/vanilla-calendar.min.js"></script>

  <?php
  require_once '../modele/Booking.php';

  $logementId = $_GET['logementId'];
  $reservedDates = BookingManager::getReservedDates($logementId);

  ?>




<script src="../css/vanilla-calendar/vanilla-calendar.min.js"></script>

 <?php
require_once '../modele/Booking.php';


if(isset($_GET['logement_id'])){
  $logementId = $_GET['logement_id'];
  }
  else{
    $logementId = -1;
  }


$reservedDates = BookingManager::getReservedDates($logementId);

// Affichage des dates réservées
$calendarDates ="";
foreach ($reservedDates as $reservation) {
  $calendarDates .= "'".$reservation['starting_date'].":".$reservation['ending_date']."',";
}
?>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
      const calendar = new VanillaCalendar('#calendar', {
        // modification à la création
        //1. Faire une méthode statique qui récupère toutes les dates réservées pour un logement
        //Select strating date et ending date where id logement et where cancelled = 0... (select, fetch_all, fect_assoc)
        /*popups: {
          '2023-06-26': {modifier: 'Reserve'},
          //ouvrir une balise php pour appeler la méthode statique de ma classe (avec les::)
        },*/
        settings: {
          selection: {
          day: 'multiple',
          },
          selected: {
            dates: [<?=$calendarDates?>],
          },
        },
      });
        calendar.init();

      });

      var elements = document.getElementsByClassName("vanilla-calendar-days vanilla-calendar-days_selecting"); 
      console.log(elements);
    </script>


<script>
  let navBar = document.getElementById("navBar");
  function togglebtn(){
    navBar.classList.toggle("hidemenu");
  }
</script>
<script src="/vue/description-appart.js"></script>
<script src="https://kit.fontawesome.com/db48a25407.js" crossorigin="anonymous"></script>
</body>
</html>