<!DOCTYPE html>
<html>

<head>
  <title>Réservation de logement</title>
  <style>
    .reservation {
      width: 400px;
      padding: 20px;
      background-color: #f2f2f2;
      margin: 20px auto;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    h2 {
      font-size: 24px;
      color: #333;
    }

    p {
      margin-bottom: 10px;
      font-size: 16px;
    }

    .reservation-date,
    .reservation-price {
      font-weight: bold;
    }

    .reservation-rating {
      color: #ffd700;
      font-size: 20px;
    }

    .star {
      display: inline-block;
    }

    .message-button,
    .edit-button,
    .delete-button {
      display: block;
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      font-size: 16px;
      text-align: center;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .message-button:hover,
    .edit-button:hover,
    .delete-button:hover {
      background-color: #45a049;
    }

    .message-field {
      display: block;
      width: 94%;
      padding: 10px;
      margin-top: 10px;
      font-size: 16px;
      border-radius: 3px;
      resize: none;
    }

    .send-button {
      display: block;
      width: 50%;
      padding: 10px;
      margin-top: 10px;
      font-size: 16px;
      text-align: center;
      background-color: #434848b2;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
      border-radius: 5px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-input {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
      border-radius: 3px;
    }

    .modal-submit {
      display: block;
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      font-size: 16px;
      text-align: center;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .modal-submit:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <?php
  include '../vue/header_menu.php';
  ?>
  <div class="reservation">
    <?php
    if ($alert != NULL) {
      if ($alert == 'good')
        $message = "Modification de date faite avec succes";
      else
        $message = "Modification de date non possible";
      echo '<script>setTimeout(function(){alert("' . $message . '");},500);</script';
    }
    ?>
    <p>Reservation à venir :</p>
    <h2>
      <?php echo $detailReservation['name'] . ' : ' . $detailReservation['fullname']; ?>
    </h2>
    <p>
      Date de la réservation: <span class="reservation-date">
        <?php echo $detailReservation['starting_date'] ?> -
        <?php echo $detailReservation['ending_date'] ?>
      </span>
    </p>
    <p>Prix: <span class="reservation-price">
        <?php echo $detailReservation['final_price'] ?>€
      </span></p>

    <p>Question sur la réservation :</p>

    <button class="edit-button">Modifier la réservation</button>

    <form action="../controlleurs/client_controlleur.php" method="post">
      <input type="hidden" name="action" value="annulerReservation" />
      <input type="hidden" name="id_reservation" value="<?php echo $detailReservation['id']; ?>" />
      <button type="submit" class="delete-button">Annuler la réservation</button>
    </form>

    <?php include '../vue/client/segment_messageries.php'; ?>


  </div>

  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Modifier la réservation :</p>
      <form action="../controlleurs/client_controlleur.php" method="get">
        <input type="hidden" name="action" value="modifierReservation" />
        <input type="hidden" name="id_reservation" value="<?php echo $detailReservation['id']; ?>" />
        <input type="hidden" name="id_logement" value="<?php echo $detailReservation['id_logement']; ?>" />
        <label for="start-date">Date de début:</label>
        <input type="date" id="start-date" class="modal-input" name="depart">
        <label for="end-date">Date de fin:</label>
        <input type="date" id="end-date" class="modal-input" name="arrive">

        <button id="submit-btn" class="modal-submit">Valider</button>
      </form>
    </div>
  </div>

  <script>
    var editButton = document.querySelector(".edit-button");
    var modal = document.getElementById("modal");
    var closeButton = document.getElementsByClassName("close")[0];
    var submitButton = document.getElementById("submit-btn");

    editButton.addEventListener("click", function () {
      modal.style.display = "block";
    });

    closeButton.addEventListener("click", function () {
      modal.style.display = "none";
    });

    submitButton.addEventListener("click", function () {
      var startDate = document.getElementById("start-date").value;
      var endDate = document.getElementById("end-date").value;

      if (startDate !== "" && endDate !== "") {
        // Effectuer les opérations de mise à jour de la réservation ici
        modal.style.display = "none";
      } else {
        //alert("Veuillez remplir toutes les informations.");
      }
    });
  </script>

</body>

</html>