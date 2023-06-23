<!DOCTYPE html>
<html>

<head>
  <title>Réservation de logement</title>
</head>
<style>
  body{
      background-color: #1b1b1b;
      font-family: Roboto, sans-serif;
    }

    .reservation {
      display: flex;
      flex-direction: column;
      margin: 0 auto;
      min-width: 500px;
      max-width: 500px;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      justify-content: center;
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
      background-color: white;
      color: black;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .message-button:hover,
    .edit-button:hover,
    .delete-button:hover {
      background-color: black;
      color: white;
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
      width: 100%;
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

<body>
  <?php
  include '../vue/header_menu.php';
  ?>
  <div class="reservation">
    <p>Reservation à venir :</p>
    <h2>
      <?php echo $detailReservation['name'] . ' : ' . $detailReservation['username']; ?>
    </h2>
    <p>
      Date de la réservation: <span class="reservation-date">
        <?php echo $detailReservation['starting_date'] ?>
      </span>
    </p>
    <p>Prix: <span class="reservation-price">
        <?php echo $detailReservation['final_price'] ?>€
      </span></p>





    <p>Question sur la reservation :</p>
    <textarea class="message-field" placeholder="Écrivez votre message"></textarea>
    <style>
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
    </style>
    <button class="send-button">Envoyer mon message</button>
    <button class="edit-button">Modifier la reservation </button>

    <form action="../controlleurs/client_controlleur.php" method="post">
      <input type="hidden" name="action" value="annulerReservation" />
      <input type="hidden" name="id_reservation" value="<?php echo $detailReservation['id']; ?>" />
      <button type="submit" class="delete-button">Annuler la reservation</button>
  </div>
</body>

</html>