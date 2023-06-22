<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Centre d'assistance</title>
  <link rel="shortcut icon" href="/vue/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #1B1B1B;
      margin: auto;
      padding: 0;
      max-width: 1440px;
      border-right: 1px solid white;
      border-left: 1px solid white;
      height: 100vh;
      
    }

    #bloc1 {
      padding: 20px;
      text-align: center;
      width: 100%;
      margin: 0 auto;
      color : white;
      text-transform: uppercase;
    }

    #bloc1 h1 {
      margin: 0;
    }

    #bloc2 {
      padding: 20px;
      margin: 20px auto;
      border-radius: 5px;
      width: 100%;
      color: white;
      text-align: center;
      text-transform: uppercase;
    }


    form {
      margin-top: 20px;
    }

    textarea {
      display: flex;
      justify-content: flex-start;
      height: 30vh;
      border: 1px solid black;
      width: 50%;
      resize: none;
      margin: 0 auto;

    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }

    .fatima {
      display: flex;
      margin: 0 auto;
      overflow-wrap: break-word;
      width: 500px;
      color: lightgray;
      font-style: italic;
    }
  </style>
</head>

<body>
<?php
  include '../vue/header_menu.php';
  ?>
  <div id="bloc1">
    <h1>Assistance</h1>
  </div>

  <div id="bloc2">
    <h2>centre d'aide</h2>
    <p class="fatima">Le service est ouvert 7 jours sur 7, 24 heures sur 24. Libre a vous de nous contacter par mail si le traitement de votre demande est long.</p>

    <form action="/envoyer_message" method="post">
      <textarea name="message"></textarea>
      <br>
      <input type="submit" value="Envoyer">
    </form>
  </div>
</body>

</html>