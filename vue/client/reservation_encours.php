<!DOCTYPE html>
<html>

<head>
  <title>Réservation de logement</title>
</head>
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
</style>

<body>
  <div class="reservation">
    <h2>Villa Luxury : Tamer Hosni</h2>
    <p>
      Date de réservation: <span class="reservation-date">17/06/2023</span>
    </p>
    <p>Prix: <span class="reservation-price">500€</span></p>

    <p>Reservation en cours...</p>

    <p>Question sur ma réservation en cours :</p>
    <form action="../controlleurs/client_controlleur.php" method="post">
      <input type="hidden" name="action" value="ajouterMessageReservation" />
      <input type="hidden" name="id_reservation" value="<?php echo $detailReservation['id']; ?>" />
      <textarea class="message-field" placeholder="Écrivez votre message" name="message"></textarea>
      <button class="send-button">Envoyer mon message</button>
    </form>
    <ul>
      <?php
      if ($detailReservation['messages'] != NULL)
        foreach ($detailReservation['messages'] as $message)
          echo "<li>" . $message['text'] . "</li>";
      ?>
    </ul>
    <style>
      .send-button {
        display: block;
        width: 50%;
        padding: 10px;
        margin-top: 10px;
        font-size: 16px;
        text-align: center;
        background-color: green;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
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
    </style>
  </div>
</body>

</html>