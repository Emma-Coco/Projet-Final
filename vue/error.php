<!DOCTYPE html>
<html>

<head>
  <title>Error</title>
</head>
<style>
  body {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    margin: 0;
    background-color: #1B1B1B;
    color: white;
    font-family: 'Roboto', sans-serif;
  }

  .error {
    display: flex;
    align-items: center;
    flex-direction: column;
    flex-wrap: wrap;
    width: 50%;
    height: 50%;
    margin: 40vh;
    padding: 10px;
  }

  a {
    text-decoration: none;
    color: #d9d9d9;
  }

  :hover.error {
    cursor: pointer;
    color: #d9d9d9;
  }
</style>

<body>
  <?php
  include '../vue/header_menu.php';
  ?>
  <div class="error">
    <?php
    $error_msg = []; /// Centralisation des messages d'erreur
    $error_msg[0] = "Some thing wrong happened";
    $error_msg[1] = "Nom d'utilisateur ou Mot de passe incorrect";
    $error_msg[2] = "Error creating user account (try enother user name may help)";
    $error_msg[3] = "Error reading details of logement";
    $error_msg[4] = "Access to this pages is denied";
    $error_msg[5] = "no such reservation";
    $error_msg[6] = "failed to fetch your account data";
    $error_msg[7] = "failed to change your account data";
    if (isset($_REQUEST['err']))
      $error_code = $_REQUEST['err'];
    else
      $error_code = 0;
    echo "<h2> $error_msg[$error_code] </h2> <a href='/controlleurs/pub_controlleur.php'>Retournez a la page de connexion</a>";
    ?>
  </div>

</body>

</html>