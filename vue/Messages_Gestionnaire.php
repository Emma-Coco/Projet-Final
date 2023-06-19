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
    require_once('/modele/Messages.php');

    // Récupération de tous les messages depuis la base de données
    $messages = MessageRepository::getAllMessages();

  ?>

  <div class="message-container">
    <div class="message-info">
      ID: <?php echo $id; ?><br>
      Booking ID: <?php echo $id_booking; ?><br>
      User ID: <?php echo $user_id; ?><br>
      Created At: <?php echo $created_at; ?>
    </div>
    <div class="message-text">
      <?php echo $text; ?>
    </div>
    <div class="reply-form">
      <form method="post" action="process_reply.php">
        <input type="hidden" name="message_id" value="<?php echo $id; ?>">
        <textarea name="reply_text" placeholder="Your reply"></textarea><br>
        <input type="submit" value="Reply">
      </form>
    </div>
  </div>

</body>
</html>
