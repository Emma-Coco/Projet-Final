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
    $error_msg[0] = "Oops! Une erreur est survenue";
    $error_msg[1] = "Nom d'utilisateur ou Mot de passe incorrect";
    $error_msg[2] = "Une erreur est survenue (essayez un autre nom d'utilisateur)";
    $error_msg[3] = "On a une erreur au niveau de l'affiochage des données";
    $error_msg[4] = "Vous ne pouvez pas etre la";
    $error_msg[5] = "Aucune réservation de ce type";
    $error_msg[6] = "Impossible de récupérer les données de votre compte";
    $error_msg[7] = "Nous n'avons pas réussi à modifier les données de votre compte";
    if (isset($_REQUEST['err']))
      $error_code = $_REQUEST['err'];
    else
      $error_code = 0;
    echo "<h2> $error_msg[$error_code] </h2> <a href='/controlleurs/pub_controlleur.php'>Retournez a la page de connexion</a>";
    ?>
  </div>

</body>

</html>