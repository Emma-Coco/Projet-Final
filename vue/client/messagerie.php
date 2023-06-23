<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      width: 60%;
      margin: 60px auto;
      border: 1px solid #80808059;
    }

    h1 {
      text-align: center;
    }

    .message-block {
      text-align: left;
    }

    .conversation {
      margin-top: 20px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
    }

    .message {
      margin-bottom: 10px;
    }

    .message .sender {
      font-weight: bold;
      padding-right: 15px;
    }

    .message .content {
      margin-top: 5px;
      padding-right: 15px;
    }

    .message.alice {
      text-align: right;
    }

    .message.bob .sender {
      text-align: left;
      padding-left: 15px;
    }

    .message.bob .content {
      text-align: left;
      padding-left: 15px;
    }

    .message-separator {
      border-top: 1px solid #ccc;
      margin: 20px 0;
      padding-top: 10px;
    }

    .message-date {
      font-size: smaller;
    }
  </style>
</head>

<body>
  <?php
  include '../modele/Messages.php';
  ?>
  <div class="message-block">
    <h1>HISTORIQUE DE MESSAGES</h1>
    <div class="conversation">
      <?php
      if ($messages == NULL)
        echo "pas de messages a afficher";
      else
        foreach ($messages as $message) {
          if ($message['username'] == $_SESSION['username']) {
            echo '<div class="message alice"><div class="sender">Moi</div>';
          } else {
            echo '<div class="message bob"><div class="sender">' . $message['first_name'] . ' ' . $message['last_name'] . '</div>';
          }
          echo '<div class="content">' . $message['text'] . '</div></div>';
          echo '<div class="message-date">' . $message['created_at'] . '</div>';
          foreach(MessageRepository::getAllResponse($message['id']) AS $response){
            echo '<div>'.$response['text'].'</div>';
          } 
          echo '<div class="message-separator"></div>';
        }
      

      ?>

    </div>
  </div>
</body>

</html>