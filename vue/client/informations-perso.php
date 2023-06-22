<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="/vue/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <title>Informations personnelles</title>
  <style>
    body {
      display: flex;
      font-family: 'Roboto', sans-serif;
      margin: 0 auto;
      background-color: #1B1B1B;
      color: white;
      text-decoration: none;
    }

    h1 {
      margin: 0 auto;
      margin-bottom: 30px;
      text-transform: uppercase;
      text-align: center;
    }

    .container {
      flex-direction: column;
      display: flex;
      margin: 0 auto;
      padding: 0 auto;
      
    }

    .section {
      margin-bottom: 40px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 20px;
      max-width: 400px;
      position: relative;
      
    }

    .label {
      font-weight: bold;
      margin-bottom: 10px;
      display: flex;
      align-items: stretch;
      justify-content: space-between;
    }

    .edit-link,
    .add-link {
      color: white;
      text-decoration: none;
      white-space: nowrap;
      border: 1px solid white;
      padding: 10px;
    }

    .add-link::after {
      content: " Ajouter";
    }

    .add-link:hover,
    .edit-link:hover {
      color: #333;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #0056b3;
    }

    .edit-section {
      position: fixed;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.8);
      width: 100vw;
      display: flex;
      align-items: center;
      justify-content: center;
      color: black;
      margin: 0 auto;
      padding: 0;
    }

    .edit-section-content {
      background-color: #1B1B1B;
      padding: 20px;
      max-width: 400px;
      text-align: center;
      color: white;
      text-decoration: none;
    }

    .edit-section-title {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .edit-section-description {
      margin-bottom: 20px;

    }

    .edit-section-input {
      margin-bottom: 10px;
      padding: 10px;
    }

    .info-section{
      margin: 0 auto;
      padding: 0 auto;
    }

    .ferme__moi {
      display: flex;
      margin:  0 auto;
      justify-content: center;
    }

    .cancel-button {
      color: white;
      text-decoration: underline;
      white-space: nowrap;
      padding: 10px;
    }

    :hover.cancel-button {
      text-decoration: none;
    }

    .save-button {
      background-color: black;
      color: white;
      border: none;
      padding: 10px 20px;
      transition: background-color 0.3s ease;
    }

    :hover.save-button {
      background-color: white;
      color: black;
    }
    
    
  </style>
  <script>
    form_nom = `<form action="../controlleurs/client_controlleur.php" method="post">
      <input type = "hidden" name = "action" value = "modifierNomCompte" />     
      <input class="edit-section-input" type="text" placeholder="Prénom" name="first_name">
      <input class="edit-section-input" type="text" placeholder="Nom" name="last_name">
      <button type="submit" class="save-button">Enregistrer</button>
          </form>
    `;
    form_email = `<form action="../controlleurs/client_controlleur.php" method="post">
      <input type = "hidden" name = "action" value = "modifierEmailCompte" />     
      <input class="edit-section-input" type="text" placeholder="e-mail" name="email">
      <button type="submit" class="save-button">Enregistrer</button>
          </form>
    `;

    function showEditSection(title, description) {
      var infoSection = document.getElementById("info-section");
      infoSection.style.display = "none";

      var editSection = document.createElement("div");
      editSection.className = "edit-section";
      editSection.innerHTML = `
        <div class="edit-section-content">
          <h2 class="edit-section-title">${title}</h2>
          <a href="#" class="cancel-button">Annuler</a>
          <p class="edit-section-description">${description}</p>
          <div class="input-container">
            ${title === "Nom légal" ? form_nom : ''}
            ${title === "Adresse e-mail" ? form_email : ''}
            ${title === "Numéro de téléphone" ? '<input class="edit-section-input" type="text" placeholder="Saisir votre numéro">' : ''}
            ${title === "Mot de passe" ? '<input class="edit-section-input" type="password" placeholder="Entrer votre mot de passe">' : ''}
          </div>
           </div>`;

      var cancelButton = editSection.querySelector(".cancel-button");
      cancelButton.addEventListener("click", function () {
        editSection.remove();
        infoSection.style.display = "block";
      });

      document.body.appendChild(editSection);
    }
  </script>
</head>

<body>
  <?php
  // include '../vue/header_menu.php';
  ?>
  <div style="
  display: flex;
  justify-content: center;
  align-items: center;
  height: 90vh;
  margin: 0 auto;
  padding: 0 auto;
  flex-direction: column;
  ">
  <div class="ferme__moi">
    <h1>Informations personnelles</h1>
  </div>
  
  <div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="section" id="info-section">
      <div class="label">
        <span class="info">Nom légal:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Nom légal', 'C\'est le nom qui figure sur votre document de voyage, à savoir votre permis ou votre passeport, par exemple.')">Modifier</a>
      </div>
      <div class="info">
        <?php echo $compte['first_name'] . ' ' . $compte['last_name'] ?>
      </div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Adresse e-mail:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Adresse e-mail', 'Utilisez une adresse à laquelle vous aurez toujours accès.')">Modifier</a>
      </div>
      <div class="info">
        <?php echo $compte['mail'] ?>
      </div>
    </div>

    <div class="section">
      <div class="label">
        <span class="info">Numéro de téléphone:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Numéro de téléphone', 'Ajoutez un numéro pour que les voyageurs confirmés et Airbnb puissent vous joindre. Vous pouvez ajouter d\'autres numéros et choisir leur usage.')">Modifier</a>
      </div>
      <div class="info"></div>
    </div>

    <div class="section">
      <div class="label">
        <span style="padding:10px;" class="info">Mot de passe:</span>
        <a href="#" class="edit-link"
          onclick="showEditSection('Mot de passe', 'Vous pouvez modifier votre mot de passe.')">Modifier le mot de
          passe</a>
      </div>
    </div>
  </div>
  </div>
  
</body>

</html>