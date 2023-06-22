<!DOCTYPE html>
<html>

<head>
  <title>Page de réservations</title>
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    div {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    section {
      margin-bottom: 20px;
      width: 300px;
      /* Largeur fixe des blocs */
      background-color: #f0f0f0;
      padding: 20px;
    }

    h2 {
      color: #333;
      margin-top: 0;
    }

    p {
      margin: 10px 0;
    }

    button {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }
  </style>
</head>



<body>
  <?php
  include '../vue/header_menu.php';
  ?>
  <div>
    <section>
      <h2>Réservations passées</h2>
      <?php
      if ($reservations == NULL)
        echo 'pas de reservations a montrer';
      else {
        $i = 0;
        foreach ($reservations as $reservation) {
          if ($reservation['etat'] != 'passee')
            continue;
          $i++;
          echo "<p>Nom de la maison : " . $reservation['name'] . "</p>";
          echo "<p>Date debut : " . $reservation['starting_date'] . "</p>";
          echo "<p>Date fin : " . $reservation['ending_date'] . "</p>";
          echo '<a href="../controlleurs/client_controlleur.php?action=detailsReservation&id_reservation=' . $reservation['id_booking'] . '">';
          echo '<button>Afficher les détails de la réservation</button></a>';
        }
        if ($i == 0)
          echo '<p>pas de reservations a montrer</p>';
      }
      ?>
    </section>

    <section>
      <h2>Réservations en cours </h2>
      <?php
      if ($reservations == NULL)
        echo 'pas de reservations a montrer';
      else {
        $i = 0;
        foreach ($reservations as $reservation) {
          if ($reservation['etat'] != 'courante')
            continue;
          $i++;
          echo "<p>Nom de la maison : " . $reservation['name'] . "</p>";
          echo "<p>Date debut : " . $reservation['starting_date'] . "</p>";
          echo "<p>Date fin : " . $reservation['ending_date'] . "</p>";
          echo '<a href="../controlleurs/client_controlleur.php?action=detailsReservation&id_reservation=' . $reservation['id_booking'] . '">';
          echo '<button>Afficher les détails de la réservation</button></a>';
        }
        if ($i == 0)
          echo '<p>pas de reservations a montrer</p>';
      }
      ?>
    </section>

    <section>
      <h2>Réservations futures</h2>
      <?php
      if ($reservations == NULL)
        echo 'pas de reservations a montrer';
      else {
        $i = 0;
        foreach ($reservations as $reservation) {
          if ($reservation['etat'] != 'future')
            continue;
          $i++;
          echo "<p>Nom de la maison : " . $reservation['name'] . "</p>";
          echo "<p>Date debut : " . $reservation['starting_date'] . "</p>";
          echo "<p>Date fin : " . $reservation['ending_date'] . "</p>";
          echo '<a href="../controlleurs/client_controlleur.php?action=detailsReservation&id_reservation=' . $reservation['id_booking'] . '">';
          echo '<button>Afficher les détails de la réservation</button></a>';
        }
        if ($i == 0)
          echo '<p>pas de reservations a montrer</p>';
      }
      ?>
    </section>
  </div>
</body>

</html>