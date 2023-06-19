<!DOCTYPE html>
<html>
<head>
  <title>Messages</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    .message-container {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      padding: 10px;
    }

    .message-info {
      font-weight: bold;
    }

    .message-text {
      margin-top: 10px;
    }

    .reply-form {
      margin-top: 20px;
    }

    .reply-form textarea {
      width: 100%;
      height: 80px;
      resize: vertical;
    }

    .reply-form input[type="submit"] {
      margin-top: 10px;
    }
  </style>
</head>

  <body>
  <h1>Messages</h1>

  <?php
    include_once('../modele/Messages.php');

    // Récupération de tous les messages depuis la base de données
    $messages = MessageRepository::getAllMessages();

    foreach ($messages as $message){

      // Affichage de chaque message avec ses informations
      echo '<div class="message-container">';
      echo '<div class="message-info">';
      echo 'ID: ' . $id . '<br>';
      echo 'Booking ID: ' . $id_booking . '<br>';
      echo 'User ID: ' . $user_id . '<br>';
      echo 'Created At: ' . $created_at;
      echo '</div>';
      echo '<div class="message-text">';
      echo $text;
      echo '</div>';
      echo '<div class="reply-form">';
      echo '<form method="post" action="process_reply.php">';
      echo '<input type="hidden" name="message_id" value="' . $id . '">';
      echo '<textarea name="reply_text" placeholder="Your reply"></textarea><br>';
      echo '<input type="submit" value="Reply">';
      echo '</form>';
      echo '</div>';
      echo '</div>';
    }
  ?>
</body>


</body>
</html>
