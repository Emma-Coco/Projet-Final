<!DOCTYPE html>
<html>

<head>
  <title>Menu Burger</title>
  <link rel="stylesheet" type="text/css" href="../vue/client/menu_berger.css" />
</head>

<body>
  <div class="menu-toggle">
    <?php echo $_SESSION['username']; ?>
    <input type="checkbox" id="menu-checkbox" />
    <label for="menu-checkbox"><img src="../vue/client/iconeburger.png" alt="Menu Burger" class="burger-icon" /></label>
    <ul class="menu_container">
      <!-- <li>
        Message
        <ul class="submenu">
          <li>Rechercher un logement disponible</li>
          <li>Afficher les détails des logements</li>
          <li>Réserver un logement</li>
        </ul> -->
      <li>
        <a href="../controlleurs/client_controlleur.php?action=listeReservations">
          Consulter les réservations</a>
      </li>
      <li>Favoris</li>
      <li>
        <a href="../vue/client/assistancehtml.php">
          Messagerie </a>
        <ul class="submenu">
          <li>Contacter l'assistance clientèle</li>
          <li>Consulter la foire aux questions</li>
        </ul>
      </li>
      <li><a href="../controlleurs/client_controlleur.php?action=monCompte">Mon compte</li>
      <li>
        <a href=" ../vue/CreateAnnouncement.php" class="register-btn">
          Publier un logement</a>
      </li>

      <li>
        <a href="../controlleurs/pub_controlleur.php?action=logout" class="register-btn">
          Déconnexion</a>
      </li>
    </ul>
  </div>

  <script src="script.js"></script>
</body>

</html>