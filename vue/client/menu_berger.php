<!DOCTYPE html>
<html>

<head>
  <title>Menu Burger</title>
  <meta charset="utf-8" />
</head>
<style>
  .menu-toggle {
  top: 20px;
  right: 20px;
  z-index: 999;
  cursor: pointer;
  padding: 24px;
  text-transform: uppercase;
  font-weight: 400;
  display: flex;
  gap: 20px;
  align-items: center;
}

.menu-toggle:hover {
  cursor: pointer;
  text-decoration: underline;
}

.menu-toggle label {
  display: block;
  width: 30px;
  height: 30px;
  position: relative;
  background: white;
  transition: transform 0.3s ease-in-out;
}

.menu-toggle span {
  display: block;
  width: 100%;
  height: 3px;
  background: white;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  transition: transform 0.3s ease-in-out;
}

.menu-toggle input {
  display: none;
}

.menu-toggle ul {
  list-style-type: none;
  padding: 0;
  position: fixed;
  top: 0;
  right: 0;
  width: 200px;
  height: 100%;
  background: white;
  transform: translateX(100%);
  transition: transform 0.3s ease-in-out;
}

.menu-toggle ul li {
  padding: 20px;
  border-bottom: 1px solid black;
  cursor: pointer;
}

.menu-toggle ul ul {
  padding: 0;
}

.menu-toggle ul ul li {
  padding-left: 20px;
  background: white;
  border-bottom: none;
}

.menu-toggle input:checked ~ ul {
  transform: translateX(0%);
}


.menu-toggle label img {
  width: 30px;
  height: 30px;
  background-color: white;
}

.menu_container {
  position: absolute;

  margin-top: 70px;
}

</style>
<body>
  <div class="menu-toggle">
    <?php echo $_SESSION['username']; ?>
    <input type="checkbox" id="menu-checkbox" />
    
    <label for="menu-checkbox">
    <svg style="display:none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18.36 19.78L12 13.41L5.64 19.78L4.22 18.36L10.59 12L4.22 5.64L5.64 4.22L12 10.59L18.36 4.23L19.77 5.64L13.41 12L19.77 18.36L18.36 19.78Z" fill="black"/>
    </svg>
      <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="30px" height="30px"><path d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z"/></svg>
    </label>
    <ul class="menu_container">
      <!-- <li>
        Message
        <ul class="submenu">
          <li>Rechercher un logement disponible</li>
          <li>Afficher les détails des logements</li>
          <li>Réserver un logement</li>
        </ul> -->
        <?php
          if (!in_array('gestion', $_SESSION['roles']) || !in_array('admin', $_SESSION['roles']) || !in_array('logistique', $_SESSION['roles'])) {
        ?>
        <li>
        <a href="../controlleurs/client_controlleur.php?action=listeReservations">
          Consulter les réservations</a>
      </li><?php } ?>
      <?php
          if (!in_array('gestion', $_SESSION['roles']) || !in_array('admin', $_SESSION['roles']) || !in_array('logistique', $_SESSION['roles'])) {
        ?>
      <li>Favoris</li><?php } ?>

      <?php
          if (!in_array('gestion', $_SESSION['roles']) || !in_array('admin', $_SESSION['roles']) || !in_array('logistique', $_SESSION['roles'])) {
        ?>
      <li>
        <a href="../vue/client/assistancehtml.php">
          assistance </a>
        <ul class="submenu">
          <li>Contacter l'assistance clientèle</li>
          <li>Consulter la foire aux questions</li>
        </ul>
      </li><?php } ?>

      <li><a href="../controlleurs/client_controlleur.php?action=monCompte">Mon compte</li>

      <?php
      if (in_array('gestion', $_SESSION['roles'])) {
        ?>

        <li>
          <a href=" ../vue/CreateAnnouncement.php" class="register-btn">
            Publier un logement</a>
        </li>
      <?php
      }
      ?>


    <?php
      if (in_array('gestion', $_SESSION['roles']) || in_array('admin', $_SESSION['roles'])) {
        ?>
        <li>
          <a href="../vue/Messages_Gestionnaire.php" class="register-btn">
            Messages</a>
        </li>
      <?php } ?>


      <?php
      if (in_array('gestion', $_SESSION['roles']) || in_array('logistique', $_SESSION['roles'])) {
        ?>
        <li>
          <a href=" ../vue/actions_entretien.php" class="register-btn">
            Logistique</a>
        </li>
      <?php } ?>


      <?php
      if (in_array('gestion', $_SESSION['roles']) || in_array('admin', $_SESSION['roles'])) {
        ?>
        <li>
          <a href="../vue/Messages_Gestionnaire.php" class="register-btn">
            Gestion des comptes</a>
        </li>
      <?php } ?>

      <li>
        <a href="../controlleurs/pub_controlleur.php?action=logout" class="register-btn">
          Déconnexion</a>
      </li>
    </ul>
  </div>

  <script src="script.js"></script>
</body>

</html>